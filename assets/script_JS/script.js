
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
