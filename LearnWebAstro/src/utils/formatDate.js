/**
 * Función que da formato a las fechas para que sean más legibles y adaptadas a nuestra zona horaria
 * @param {Date|string} dateInput
 * @returns devuelve la fecha en string con un formato determinado y basado en unos parámetros
 * @throws {Error} si la fecha es inválida (no es posible obtener los milisegundos)
 */
export const formatISODateAuto = (dateInput) => {
  try {
    // Si es string lo pasa a Date
    const date =
      typeof dateInput === "string" ? new Date(dateInput) : dateInput;

    if (isNaN(date.getTime())) throw new Error("Invalid date");

    // numeric da número, long es en texto
    // le pasamos el idioma en el que lo queremos en el primer argumento de toLocaleString ("es-ES") para español
    // pasamos de hour y minute ya que no es necesario que el usuario sepa con exactitud la hora de creación y/o modificación de un tutorial/curso
    return date.toLocaleString("es-ES", {
      year: "numeric",
      month: "long",
      day: "numeric",
      //hour: "2-digit", // quitamos el mostrar horas y minutos
      //minute: "2-digit",
      timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone,
    });
  } catch (error) {
    return "Fecha no disponible";
  }
};
