const apiUrl = import.meta.env.PUBLIC_API;

/**
 * Realiza una petición GET a la API, sin token, usado principalmente para iniciar sesión con un usuario cuando aún no se ha guardado token, o para comprobar si existe un usuario dado el nickname y email (en registro)
 * @param {string} endpoint - Ruta del endpoint
 * @returns {Promise<Object>} Respuesta de la API parseada como JSON
 * @throws {Error} Si la respuesta no es exitosa
 */
const get = async (endpoint) => {
  const response = await fetch(`${apiUrl}${endpoint}`, {
    method: "GET",
    headers: {
      accept: "application/json",
      "Content-Type": "application/json",
    },
  });
  if (!response.ok) {
    throw new Error(
      `Error en la petición GET al endpoint: ${endpoint} (${response.status} ${response.statusText})`
    );
  }
  const data = await response.json();
  return data;
};

/**
 * Realiza una petición GET autenticada con JWT
 * @param {string} endpoint - Ruta del endpoint
 * @param {string} token - Token JWT de autenticación
 * @returns {Promise<Object>} Respuesta de la API parseada como JSON
 * @throws {Error} Si la respuesta no es exitosa
 */
const get_jwt = async (endpoint, token) => {
  const response = await fetch(`${apiUrl}${endpoint}`, {
    method: "GET",
    headers: {
      Authorization: `Bearer ${token}`,
      accept: "application/json",
      "Content-Type": "application/json",
    },
  });
  if (!response.ok) {
    throw new Error(
      `Error en la petición GET al endpoint: ${endpoint} (${response.status} ${response.statusText})`
    );
  }
  const data = await response.json();
  return data;
};

/**
 * Realiza una petición POST a la API
 * @param {string} endpoint - Ruta del endpoint
 * @param {Object} dto - Objeto de transferencia de datos a enviar
 * @returns {Promise<Object>} Respuesta de la API parseada como JSON
 * @throws {Error} Si la respuesta no es exitosa
 */
const post = async (endpoint, dto) => {
  const response = await fetch(`${apiUrl}${endpoint}`, {
    method: "POST",
    headers: {
      accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify(dto),
  });
  if (!response.ok) {
    throw new Error(
      `Error en la petición POST al endpoint: ${endpoint} (${response.status} ${response.statusText})`
    );
  }
  const data = await response.json();
  return data;
};

/**
 * Realiza una petición POST autenticada con JWT
 * @param {string} endpoint - Ruta del endpoint
 * @param {Object} dto - Objeto de transferencia de datos a enviar
 * @param {string} token - Token JWT de autenticación
 * @returns {Promise<Object>} Respuesta de la API parseada como JSON
 * @throws {Error} Si la respuesta no es exitosa
 */
const post_jwt = async (endpoint, dto, token) => {
  const response = await fetch(`${apiUrl}${endpoint}`, {
    method: "POST",
    headers: {
      Authorization: `Bearer ${token}`,
      accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify(dto),
  });
  if (!response.ok) {
    throw new Error(
      `Error en la petición POST al endpoint: ${endpoint} (${response.status} ${response.statusText})`
    );
  }
  const data = await response.json();
  return data;
};

/**
 * Realiza una petición PUT a la API
 * @param {string} endpoint - Ruta del endpoint
 * @param {Object} dto - Objeto de transferencia de datos a actualizar
 * @returns {Promise<Object>} Respuesta de la API parseada como JSON
 * @throws {Error} Si la respuesta no es exitosa
 */
const put = async (endpoint, dto) => {
  const response = await fetch(`${apiUrl}${endpoint}`, {
    method: "PUT",
    headers: {
      accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify(dto),
  });
  if (!response.ok) {
    throw new Error(
      `Error en la petición PUT al endpoint: ${endpoint} (${response.status} ${response.statusText})`
    );
  }
  const data = await response.json();
  return data;
};

/**
 * Realiza una petición PUT autenticada con JWT
 * @param {string} endpoint - Ruta del endpoint
 * @param {Object} dto - Objeto de transferencia de datos a actualizar
 * @param {string} token - Token JWT de autenticación
 * @returns {Promise<Object>} Respuesta de la API parseada como JSON
 * @throws {Error} Si la respuesta no es exitosa
 */
const put_jwt = async (endpoint, dto, token) => {
  const response = await fetch(`${apiUrl}${endpoint}`, {
    method: "PUT",
    headers: {
      Authorization: `Bearer ${token}`,
      accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify(dto),
  });
  if (!response.ok) {
    throw new Error(
      `Error en la petición PUT al endpoint: ${endpoint} (${response.status} ${response.statusText})`
    );
  }
  const data = await response.json();
  return data;
};

/**
 * Realiza una petición DELETE autenticada con JWT
 * @param {string} endpoint - Ruta del endpoint
 * @param {string} token - Token JWT de autenticación
 * @returns {Promise<void>} No devuelve nada
 * @throws {Error} Si la respuesta no es exitosa
 */
const deleteMethod = async (endpoint, token) => {
  await fetch(`${apiUrl}${endpoint}`, {
    method: "DELETE",
    headers: {
      Authorization: `Bearer ${token}`,
      accept: "application/json",
      "Content-Type": "application/json",
    },
  });
};

export { get, post, put, deleteMethod, get_jwt, post_jwt, put_jwt };
