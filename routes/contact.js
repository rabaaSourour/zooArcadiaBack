const express = require('express');
const nodemailer = require('nodemailer');
const router = express.Router();

// Configuration du transporteur de mail
const transporter = nodemailer.createTransport({
  service: 'Gmail',
  auth: {
    user: process.env.EMAIL_USER,
    pass: process.env.EMAIL_PASS
  }
});

// Route pour gérer la soumission du formulaire
router.post('/', async (req, res) => {
  const { email, title, description } = req.body;

  // Valider les entrées
  if (!email || !title || !description) {
    return res.status(400).json({ msg: 'Veuillez remplir tous les champs' });
  }

  const mailOptions = {
    from: email,
    to: process.env.EMAIL_USER,
    subject: `Contact Form Submission: ${title}`,
    text: `Vous avez reçu une nouvelle soumission de formulaire de contact.\n\nDétails:\n\nEmail: ${email}\nTitre: ${title}\nDescription: ${description}`
  };

  try {
    await transporter.sendMail(mailOptions);
    res.status(200).json({ msg: 'Votre email a bien été envoyé !' });
  } catch (error) {
    res.status(500).json({ msg: 'Erreur serveur. Impossible d\'envoyer l\'email.' });
  }
});

module.exports = router;
