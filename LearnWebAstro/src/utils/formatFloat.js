/**
 * Función para darle formato a un número, fuerza el tipo de dato a número para poder realizar las operaciones matemáticas para determinar el output
 * @param {*} input
 * @returns 0.0 si no hay número, X.0 si el número es entero (resto 0 cuando se divide entre 1) (p.e: 4.0), X.X si tiene un decimal (p.e: 4.2), X.XX si todo lo anterior no se cumple (p.e: 4,25)
 */
export const formatFloat = (input) => {
  const num = Number(input);
  return isNaN(num)
    ? "0.0"
    : num % 1 === 0
    ? `${num}.0`
    : Math.round(num * 100) / 100 === Math.round(num * 10) / 10
    ? num.toFixed(1)
    : num.toFixed(2);
};
