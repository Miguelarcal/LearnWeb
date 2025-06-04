// src/middleware.js
import { checkUserBan } from "@api/useCases";
import { jwtDecode } from "jwt-decode";

export async function onRequest({ cookies, redirect, request }, next) {
  // Rutas públicas que no requieren autenticación
  const publicRoutes = [
    "/login",
    "/register",
    "/api/auth",
    "/_astro", // Assets de Astro
    "/favicon.ico",
  ];

  // Rutas de administrador que requieren autenticación
  const adminRoutes = [
    "/admin-panel",
    "/admin-users",
    "/ban-user",
    "/register-admin",
  ];

  // Rutas no disponibles para usuarios baneados que requieren autenticación
  const notForBannedUsers = [
    "/admin-panel",
    "/admin-users",
    "/ban-user",
    "/register-admin",
    "/edit-course",
    "/edit-tutorial",
    "/hide-course",
    "/hide-tutorial",
    "/new-course",
    "/new-tutorial",
  ];

  // Si es ruta pública, continuar sin validación
  if (publicRoutes.some((route) => request.url.includes(route))) {
    return next();
  }

  // Obtenemos el token de las cookies
  const token = cookies.get("jwt_token")?.value;

  // Si no hay token, redirigimos a login
  if (!token) {
    return redirect("/login", 302);
  }

  // Validamos el token JWT
  try {
    const decoded = jwtDecode(token);

    // Verificamos expiración
    const isExpired = decoded.exp * 1000 < Date.now();
    if (isExpired) {
      cookies.delete("jwt_token");
      return redirect("/login", 302);
    }

    // Comprobamos las rutas protegidas por permisos admin, si está en una de las rutas no permitidas lo mandamos a una página que le avisa sobre sus permisos
    if (
      decoded["role"] != "ROLE_ADMIN" &&
      adminRoutes.some((route) => request.url.includes(route))
    ) {
      return redirect("/notadmin", 302);
    }

    // Verificamos el baneo y si está en una de las rutas no permitidas lo mandamos a una página que avisa sobre su baneo
    if (notForBannedUsers.some((route) => request.url.includes(route))) {
      try {
        const isBanned = await checkUserBan(decoded["id"], token);
        if (isBanned) {
          return redirect("/banned", 302);
        }
      } catch (banError) {
        console.error("Ban check failed:", banError);
        return next();
      }
    }
    return next();
  } catch (error) {
    cookies.delete("jwt_token");
    return redirect("/login", 302);
  }
}
