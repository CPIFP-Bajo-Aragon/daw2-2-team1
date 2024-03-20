const createRating = ({
    rating,
    total = 5,
    starIcon = '★',
    emptyIcon = '☆',
}) => {
    const stars = starIcon.repeat(rating);
    const empty = emptyIcon.repeat(total - rating);

    return stars + empty;
};

// Estrellas por defecto
const ratingString = createRating({ rating: 0 });
document.getElementById('ratingStars').innerHTML = ratingString;

// Manejar clics en las estrellas
document.getElementById('ratingStars').addEventListener('click', (event) => {
    // Obtener la calificación según la posición del clic
    const rect = event.target.getBoundingClientRect();
    const offsetX = event.clientX - rect.left;

    // Ajustar el cálculo del rating para tener en cuenta el padding
    const rating = Math.ceil((offsetX / (rect.width - 2)) * 5);

    // Actualizar el valor del campo de entrada oculto
    document.getElementById('ratingInput').value = rating;

    // Crear la cadena de calificación usando la función createRating
    const ratingString = createRating({ rating });

    // Puedes actualizar la interfaz de usuario con la calificación, por ejemplo:
    document.getElementById('ratingStars').innerHTML = ratingString;
});