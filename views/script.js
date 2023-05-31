// Validation du formulaire côté client
document.querySelector('form').addEventListener('submit', function(event) {

    // prenom
       var prenomInput = document.getElementById('prenomInput');
       var prenomError = document.getElementById('prenomError');

       if (prenomInput.value.trim() === '') {
           prenomError.textContent = 'Veuillez saisir un prenom.';
           prenomError.style.display = 'block';
           event.preventDefault(); // Empêche l'envoi du formulaire
       } else {
           prenomError.textContent = ''; // Efface le message d'erreur
           prenomError.style.display = 'none';
       }
         //nom
         var nomInput = document.getElementById('nomInput');
         var nomError = document.getElementById('nomError');

       if (nomInput.value.trim() === '') {
           nomError.textContent = 'Veuillez saisir un nom.';
           nomError.style.display = 'block';
           event.preventDefault(); // Empêche l'envoi du formulaire
       } else {
           nomError.textContent = ''; // Efface le message d'erreur
           nomError.style.display = 'none';
       }

              //tel
              var telInput = document.getElementById('telInput');
         var telError = document.getElementById('telError');

       if (telInput.value.trim() === '') {
           telError.textContent = 'Veuillez saisir un numero de telephone.';
           telError.style.display = 'block';
           event.preventDefault(); // Empêche l'envoi du formulaire
       } else {
           telError.textContent = ''; // Efface le message d'erreur
           telError.style.display = 'none';
       }

   //adresse
         var adresseInput = document.getElementById('adresseInput');
         var adresseError = document.getElementById('adresseError');

       if (adresseInput.value.trim() === '') {
           adresseError.textContent = 'Veuillez saisir une adresse.';
           adresseError.style.display = 'block';
           event.preventDefault(); // Empêche l'envoi du formulaire
       } else {
           adresseError.textContent = ''; // Efface le message d'erreur
           adresseError.style.display = 'none';
       }
        //email
        var emailInput = document.getElementById('emailInput');
         var emailError = document.getElementById('emailError');

       if (emailInput.value.trim() === '') {
           emailError.textContent = 'Veuillez saisir un email.';
           emailError.style.display = 'block';
           event.preventDefault(); // Empêche l'envoi du formulaire
       } else {
           emailError.textContent = ''; // Efface le message d'erreur
           emailError.style.display = 'none';
       }







       //salaire
       var salaireInput = document.getElementById('salaireInput');
       var salaireError = document.getElementById('salaireError');
       
       var salaire = parseInt(salaireInput.value.trim());
       
       if (isNaN(salaire) || salaire.toString() !== salaireInput.value.trim()) {
           salaireError.textContent = 'Veuillez saisir un salaire entier.';
           salaireError.style.display = 'block';
           event.preventDefault(); // Empêche l'envoi du formulaire
       } else {
           salaireError.textContent = ''; // Efface le message d'erreur
           salaireError.style.display = 'none';
       }
   });