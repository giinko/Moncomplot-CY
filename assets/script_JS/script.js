
document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.catalogue');

    articles.forEach(article => {
        const box = document.createElement('div');
        box.className = 'box';

        const image = document.createElement('img');
        image.src = article.image;
        image.alt = 'Image de ' + article.titre;

        const title = document.createElement('h3');
        title.textContent = article.titre;

        const description = document.createElement('p');
        description.textContent = article.description;

        box.appendChild(image);
        box.appendChild(title);
        box.appendChild(description);

        container.appendChild(box);
    });
});

function openSubscriptionModal() {
    var modal = document.getElementById('subscriptionModal');
    modal.style.display = 'block';
}

function closeSubscriptionModal() {
    var modal = document.getElementById('subscriptionModal');
    modal.style.display = 'none';
}

function redirectToRegistration() {
    window.location.href = 'inscription.html'; // Rediriger vers la page d'inscription
}

// Sélection de toutes les cartes
const cards = document.querySelectorAll('.conspiration-card');

// Ajout d'un gestionnaire d'événements click à chaque carte
cards.forEach(card => {
    card.addEventListener('click', function () {
        // Vérifier si la carte est déjà sélectionnée ou non
        if (this.classList.contains('selected')) {
            this.classList.remove('selected'); // Si elle est sélectionnée, la désélectionner
        } else {
            this.classList.add('selected'); // Si elle n'est pas sélectionnée, la sélectionner
        }
    });
});
