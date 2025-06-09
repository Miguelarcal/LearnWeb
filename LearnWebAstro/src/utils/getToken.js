import { jwtDecode } from "jwt-decode";

/**
 * Función que obtiene el token almacenado en las cookies y lo devuelve
 * @returns token
 */
export function getToken() {
  const cookies = document.cookie;

  const jwtCookie = cookies
    .split("; ")
    .find((cookie) => cookie.startsWith("jwt_token="));

  if (jwtCookie) {
    return jwtCookie.split("=")[1];
  }

  return null;
}

/**
 * Función que obtiene el token almacenado en las cookies y lo devuelve decodificado con jwtDecode
 * @returns token decodificado
 */
export function getDecodedToken() {
  const cookies = document.cookie;

  const jwtCookie = cookies
    .split("; ")
    .find((cookie) => cookie.startsWith("jwt_token="));

  if (jwtCookie) {
    return jwtDecode(jwtCookie.split("=")[1]);
  }

  return null;
}

/**
 * Función que usa jwtDecode para decodificar un token
 * @param {string} token
 * @returns token decodificado
 */
export function decodeToken(token) {
  return jwtDecode(token);
}
