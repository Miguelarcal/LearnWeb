import { deleteMethod, get, get_jwt, post_jwt, put_jwt } from "./api";

/**
 * Obtiene todos los usuarios (requiere autenticación)
 * @param {string} token - Token JWT de autenticación
 * @returns {Promise<Array>} Lista de usuarios
 */
const getUsers = async (token) => {
  const endpoint = "/api/users";
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Obtiene un usuario por credenciales de acceso
 * @param {string} nickname - Nombre de usuario
 * @param {string} passwd - Contraseña
 * @returns {Promise<Object>} Datos del usuario
 */
const getUserByLogin = async (nickname, passwd) => {
  const endpoint = `/api/users/login/${nickname}/${passwd}`;
  const data = await get(endpoint);
  return data;
};

/**
 * Obtiene un usuario por ID (requiere autenticación)
 * @param {number|string} id - ID del usuario
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Datos del usuario
 */
const getUserById = async (id, token) => {
  const endpoint = `/api/users/${id}`;
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Verifica si existe un usuario por nickname y email
 * @param {string} nickname - Nombre de usuario
 * @param {string} email - Correo electrónico
 * @returns {Promise<Object>} Resultado de verificación
 */
const checkUserExistence = async (nickname, email) => {
  const endpoint = `/api/users/check/${nickname}/${email}`;
  const data = await get(endpoint);
  return data;
};

/**
 * Comprueba si un usuario está baneado
 * @param {number|string} id - ID del usuario
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Estado de ban
 */
const checkUserBan = async (id, token) => {
  const endpoint = `/api/users/isbanned/${id}`;
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Registra un nuevo usuario
 * @param {string} nickname - Nombre de usuario
 * @param {string} email - Correo electrónico
 * @param {string} passwd - Contraseña
 * @returns {Promise<Object>} Usuario registrado
 */
const register = async (nickname, email, passwd) => {
  const endpoint = `/api/users/register/${nickname}/${email}/${passwd}`;
  const data = await get(endpoint);
  return data;
};

/**
 * Registra un nuevo administrador
 * @param {string} nickname - Nombre de usuario
 * @param {string} email - Correo electrónico
 * @param {string} passwd - Contraseña
 * @returns {Promise<Object>} Administrador registrado
 */
const registerAdmin = async (nickname, email, passwd) => {
  const endpoint = `/api/users/registeradmin/${nickname}/${email}/${passwd}`;
  const data = await get(endpoint);
  return data;
};

/**
 * Crea un nuevo tutorial (requiere autenticación)
 * @param {Object} tutorial_data - Datos del tutorial
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Tutorial creado
 */
const newTutorial = async (tutorial_data, token) => {
  const endpoint = `/api/newtutorial`;
  const data = await post_jwt(endpoint, tutorial_data, token);
  return data;
};

/**
 * Crea una nueva página (requiere autenticación)
 * @param {Object} page_data - Datos de la página
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Página creada
 */
const newPage = async (page_data, token) => {
  const endpoint = `/api/newpage`;
  const data = await post_jwt(endpoint, page_data, token);
  return data;
};

/**
 * Crea un nuevo bloque (requiere autenticación)
 * @param {Object} block_data - Datos del bloque
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Bloque creado
 */
const newBlock = async (block_data, token) => {
  const endpoint = `/api/newblock`;
  const data = await post_jwt(endpoint, block_data, token);
  return data;
};

/**
 * Obtiene tutoriales disponibles (requiere autenticación)
 * @param {string} token - Token JWT
 * @returns {Promise<Array>} Lista de tutoriales
 */
const getTutorialsAvaidable = async (token) => {
  const endpoint = "/api/tutorialsavaidable";
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Obtiene un tutorial por ID (requiere autenticación)
 * @param {number|string} id - ID del tutorial
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Datos del tutorial
 */
const getTutorialById = async (id, token) => {
  const endpoint = `/api/tutorials/${id}`;
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Obtiene un curso por ID (requiere autenticación)
 * @param {number|string} id - ID del curso
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Datos del curso
 */
const getCourseById = async (id, token) => {
  const endpoint = `/api/courses/${id}`;
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Endpoint personalizado con autenticación
 * @param {string} endpoint - Ruta personalizada
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Respuesta del endpoint
 */
const customEndpointJwt = async (endpoint, token) => {
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Eliminación personalizada (requiere autenticación)
 * @param {string} endpoint - Ruta a eliminar
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Resultado de la eliminación
 */
const customDelete = async (endpoint, token) => {
  const data = await deleteMethod(endpoint, token);
  return data;
};

/**
 * Actualiza un tutorial (requiere autenticación)
 * @param {Object} tutorial_data - Nuevos datos del tutorial
 * @param {number|string} id - ID del tutorial
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Tutorial actualizado
 */
const updateTutorial = async (tutorial_data, id, token) => {
  const endpoint = `/api/updatetutorial/${id}`;
  const data = await put_jwt(endpoint, tutorial_data, token);
  return data;
};

/**
 * Obtiene los tutoriales de un usuario (requiere autenticación)
 * @param {number|string} id - ID del usuario
 * @param {string} token - Token JWT
 * @returns {Promise<Array>} Lista de tutoriales
 */
const getMyTutorials = async (id, token) => {
  const endpoint = `/api/getmytutorials/${id}`;
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Crea un nuevo curso (requiere autenticación)
 * @param {Object} course_data - Datos del curso
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Curso creado
 */
const newCourse = async (course_data, token) => {
  const endpoint = `/api/newcourse`;
  const data = await post_jwt(endpoint, course_data, token);
  return data;
};

/**
 * Añade un tutorial a un curso (requiere autenticación)
 * @param {Object} tutorial_in_course_data - Datos de relación
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Relación creada
 */
const newTutorialInCourse = async (tutorial_in_course_data, token) => {
  const endpoint = `/api/newtutorialincourse`;
  const data = await post_jwt(endpoint, tutorial_in_course_data, token);
  return data;
};

/**
 * Obtiene cursos disponibles (requiere autenticación)
 * @param {string} token - Token JWT
 * @returns {Promise<Array>} Lista de cursos
 */
const getCoursesAvaidable = async (token) => {
  const endpoint = "/api/coursessavaidable";
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Obtiene tutoriales de un curso (requiere autenticación)
 * @param {number|string} id - ID del curso
 * @param {string} token - Token JWT
 * @returns {Promise<Array>} Lista de tutoriales
 */
const getTutorialsFromCourse = async (id, token) => {
  const endpoint = `/api/gettutorialsfromcourse/${id}`;
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Elimina un tutorial de un curso (requiere autenticación)
 * @param {number|string} id - ID de la relación
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Resultado de eliminación
 */
const deleteTutorialInCourse = async (id, token) => {
  const data = await deleteMethod(`/api/tutorial_in_courses/${id}`, token);
  return data;
};

/**
 * Actualiza un curso (requiere autenticación)
 * @param {Object} course_data - Nuevos datos del curso
 * @param {number|string} id - ID del curso
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Curso actualizado
 */
const updateCourse = async (course_data, id, token) => {
  const endpoint = `/api/updatecourse/${id}`;
  const data = await put_jwt(endpoint, course_data, token);
  return data;
};

/**
 * Obtiene los cursos de un usuario (requiere autenticación)
 * @param {number|string} id - ID del usuario
 * @param {string} token - Token JWT
 * @returns {Promise<Array>} Lista de cursos
 */
const getMyCourses = async (id, token) => {
  const endpoint = `/api/getmycourses/${id}`;
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Obtiene tutoriales disponibles filtrados (requiere autenticación)
 * @param {Object} filters - Objeto con filtros
 * @param {*} filters.text - Texto de búsqueda
 * @param {*} filters.minRating - Valoración mínima
 * @param {*} filters.maxRating - Valoración máxima
 * @param {*} filters.sortBy - Criterio de ordenación
 * @param {*} filters.hidden - Incluir ocultos
 * @param {string} token - Token JWT
 * @returns {Promise<Array>} Tutoriales filtrados
 */
const getTutorialsAvaidableFiltered = async (filters, token) => {
  const texto = filters.text == "" ? " " : filters.text;
  const endpoint = `/api/tutorials/filter/${texto}/${filters.minRating}/${filters.maxRating}/${filters.sortBy}/${filters.hidden}`;
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Obtiene cursos disponibles filtrados (requiere autenticación)
 * @param {Object} filters - Objeto con filtros
 * @param {*} filters.text - Texto de búsqueda
 * @param {*} filters.minRating - Valoración mínima
 * @param {*} filters.maxRating - Valoración máxima
 * @param {*} filters.difficulty - Dificultad
 * @param {*} filters.sortBy - Criterio de ordenación
 * @param {*} filters.hidden - Incluir ocultos
 * @param {string} token - Token JWT
 * @returns {Promise<Array>} Cursos filtrados
 */
const getCoursesAvaidableFiltered = async (filters, token) => {
  const texto = filters.text == "" ? " " : filters.text;
  const endpoint = `/api/courses/filter/${texto}/${filters.minRating}/${filters.maxRating}/${filters.difficulty}/${filters.sortBy}/${filters.hidden}`;
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Cambia visibilidad de tutorial (requiere autenticación)
 * @param {number|string} id - ID del tutorial
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Resultado del cambio
 */
const changeHiddenTutorial = async (id, token) => {
  const endpoint = `/api/changehiddentutorial/${id}`;
  const data = await put_jwt(endpoint, null, token);
  return data;
};

/**
 * Cambia visibilidad de curso (requiere autenticación)
 * @param {number|string} id - ID del curso
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Resultado del cambio
 */
const changeHiddenCourse = async (id, token) => {
  const endpoint = `/api/changehiddencourse/${id}`;
  const data = await put_jwt(endpoint, null, token);
  return data;
};

/**
 * Cambia estado de ban de usuario (requiere autenticación)
 * @param {number|string} id - ID del usuario
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Resultado del cambio
 */
const changeBanUser = async (id, token) => {
  const endpoint = `/api/changebanuser/${id}`;
  const data = await put_jwt(endpoint, null, token);
  return data;
};

/**
 * Obtiene todos los tutoriales (requiere autenticación)
 * @param {string} token - Token JWT
 * @returns {Promise<Array>} Lista completa de tutoriales
 */
const getAllTutorials = async (token) => {
  const endpoint = "/api/getalltutorials";
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Obtiene todos los cursos (requiere autenticación)
 * @param {string} token - Token JWT
 * @returns {Promise<Array>} Lista completa de cursos
 */
const getAllCourses = async (token) => {
  const endpoint = "/api/courses";
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Crea nueva puntuación para tutorial (requiere autenticación)
 * @param {Object} tutorial_score_data - Datos de puntuación
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Puntuación creada
 */
const newTutorialScore = async (tutorial_score_data, token) => {
  const endpoint = `/api/newtutorialscore`;
  const data = await post_jwt(endpoint, tutorial_score_data, token);
  return data;
};

/**
 * Obtiene puntuación de un tutorial (requiere autenticación)
 * @param {number|string} tutorial_id - ID del tutorial
 * @param {number|string} user_id - ID del usuario
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Puntuación del tutorial
 */
const getaTutorialScore = async (tutorial_id, user_id, token) => {
  const endpoint = `/api/getatutorialscore/${tutorial_id}/${user_id}`;
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Actualiza puntuación de tutorial (requiere autenticación)
 * @param {number|string} tutorial_id - ID del tutorial
 * @param {number|string} user_id - ID del usuario
 * @param {number} score - Nueva puntuación
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Puntuación actualizada
 */
const updateTutorialScore = async (tutorial_id, user_id, score, token) => {
  const endpoint = `/api/updatetutorialscore/${tutorial_id}/${user_id}`;
  const data = await put_jwt(endpoint, score, token);
  return data;
};

/**
 * Obtiene promedio de puntuaciones de tutorial (requiere autenticación)
 * @param {*} tutorial_id - ID del tutorial
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Promedio de puntuaciones
 */
const averageTutorialScore = async (tutorial_id, token) => {
  const endpoint = `/api/averagetutorialscore/${tutorial_id}`;
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Crea nueva puntuación para curso (requiere autenticación)
 * @param {Object} course_score_data - Datos de puntuación
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Puntuación creada
 */
const newCourseScore = async (course_score_data, token) => {
  const endpoint = `/api/newcoursescore`;
  const data = await post_jwt(endpoint, course_score_data, token);
  return data;
};

/**
 * Obtiene puntuación de un curso (requiere autenticación)
 * @param {number|string} course_id - ID del curso
 * @param {number|string} user_id - ID del usuario
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Puntuación del curso
 */
const getaCourseScore = async (course_id, user_id, token) => {
  const endpoint = `/api/getacoursescore/${course_id}/${user_id}`;
  const data = await get_jwt(endpoint, token);
  return data;
};

/**
 * Actualiza puntuación de curso (requiere autenticación)
 * @param {number|string} course_id - ID del curso
 * @param {number|string} user_id - ID del usuario
 * @param {number} score - Nueva puntuación
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Puntuación actualizada
 */
const updateCourseScore = async (course_id, user_id, score, token) => {
  const endpoint = `/api/updatecoursescore/${course_id}/${user_id}`;
  const data = await put_jwt(endpoint, score, token);
  return data;
};

/**
 * Obtiene promedio de puntuaciones de curso (requiere autenticación)
 * @param {*} course_id - ID del curso
 * @param {string} token - Token JWT
 * @returns {Promise<Object>} Promedio de puntuaciones
 */
const averageCourseScore = async (course_id, token) => {
  const endpoint = `/api/averagecoursescore/${course_id}`;
  const data = await get_jwt(endpoint, token);
  return data;
};

export {
  getUsers,
  getUserByLogin,
  getUserById,
  checkUserExistence,
  checkUserBan,
  register,
  registerAdmin,
  newTutorial,
  newPage,
  newBlock,
  getTutorialsAvaidable,
  getTutorialById,
  customDelete,
  updateTutorial,
  getMyTutorials,
  newCourse,
  newTutorialInCourse,
  getCoursesAvaidable,
  getCourseById,
  getTutorialsFromCourse,
  deleteTutorialInCourse,
  updateCourse,
  getMyCourses,
  getTutorialsAvaidableFiltered,
  getCoursesAvaidableFiltered,
  changeHiddenTutorial,
  changeHiddenCourse,
  changeBanUser,
  getAllTutorials,
  getAllCourses,
  newTutorialScore,
  getaTutorialScore,
  updateTutorialScore,
  averageTutorialScore,
  newCourseScore,
  getaCourseScore,
  updateCourseScore,
  averageCourseScore,
  customEndpointJwt,
};
