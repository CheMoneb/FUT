<?php


if ($stmt->execute()) {
        // Redirection après suppression
        header("Location: ../index.php");
        exit;
    } else {
        echo "Erreur de suppression.";
    }
   