<?php
require_once 'funciones.php';

session_start(); // Inicia la sesión.

if (!isset($_SESSION['productes'])) { // Comprueba que la variable productes existe
    $_SESSION['productes'] = []; // Si no hay la inicializa como un array vacío.
}
if (!isset($_SESSION['categories'])) { // Comprueba que la variable categoria existe
    $_SESSION['categories'] = []; // Si no hay la inicializa como un array vacío.
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Verifica si la solicitud es de tipo POST.
    if (isset($_POST['afegirProducte'])) { // Verifica si se ha enviado el formulario para agregar un producto.
        $nomProducte = $_POST['nomProducte'];
        $descripcioProducte = $_POST['descripcioProducte'];
        $preuProducte = $_POST['preuProducte'];

        // Crea el producto y lo añade a la sesión.
        $producte = crearProducte($nomProducte, $descripcioProducte, $preuProducte);
        $_SESSION['productes'][] = $producte; // Los añade a la array de la sesión.
    }

    if (isset($_POST['afegirCategoria'])) { // Verifica si se ha enviado el formulario para agregar una categoría.
        $nomCategoria = $_POST['nomCategoria'];
        $descripcioCategoria = $_POST['descripcioCategoria'];

        // Crea la categoría y la añade a la sesión.
        $categoria = crearCategoria($nomCategoria, $descripcioCategoria);
        $_SESSION['categories'][] = $categoria; // Los añade a la array de la sesión.
    }

    if (isset($_POST['afegirProducteACategoria'])) { // Verifica si se ha enviado el formulario para asociar un producto a una categoría.
        $producteIndex = $_POST['producte'];
        $categoriaIndex = $_POST['categoria'];

        if (isset($_SESSION['productes'][$producteIndex]) && isset($_SESSION['categories'][$categoriaIndex])) { // Verifica si los índices del producto y la categoría existen en la sesión.
            $producte = $_SESSION['productes'][$producteIndex];
            $categoria = $_SESSION['categories'][$categoriaIndex];
            agregarCategoriaAProducte($producte, $categoria); // Asocia la categoría al producto.
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Productes i Categories</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        h1, h2 {
            color: #E74C3C;
        }

        form {
            background-color: #ffffff;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: calc(100% - 22px);
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        button[type="submit"] {
            background-color: #E74C3C;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-top: 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #C0392B;
        }

        .product-list, .category-list, .combined-list {
            background-color: #ffffff;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


    </style>
</head>
<body>

<h1>Gestor de Productes i Categories</h1>

<h2>Afegeix un Producte</h2>
<form method="POST" action="index.php">
    <label for="nomProducte">Nom del Producte:
    <input type="text" name="nomProducte" required>
    </label>
    <label for="descripcioProducte">Descripció:
    <input type="text" name="descripcioProducte" required>
    </label>
    <label for="preuProducte">Preu:
    <input type="number" step="0.01" name="preuProducte" required>
    </label>
    <button type="submit" name="afegirProducte">Afegir Producte</button>
</form>

<h2>Afegeix una Categoria</h2>
<form method="POST" action="index.php">
    <label for="nomCategoria">Nom de la Categoria:
    <input type="text" name="nomCategoria" required>
    </label>
    <label for="descripcioCategoria">Descripció:
    <input type="text" name="descripcioCategoria" required>
    </label>
    <button type="submit" name="afegirCategoria">Afegir Categoria</button>
</form>

<h2>Afegeix Producte a Categoria</h2>
<form method="POST" action="index.php">
    <label for="producte">Selecciona Producte:
    <select name="producte" required>
        <?php
        foreach ($_SESSION['productes'] as $index => $producte) { // Recorre los productos en la sesión.
            echo "<option value='$index'>" . htmlspecialchars($producte->getNom()) . "</option>"; // Muestra cada producto en el desplegable.
        }
        ?>
    </select>
    </label>
    <label for="categoria">Selecciona Categoria:
    <select name="categoria" required>
        <?php
        foreach ($_SESSION['categories'] as $index => $categoria) { // Recorre las categorías en la sesión.
            echo "<option value='$index'>" . htmlspecialchars($categoria->getNom()) . "</option>";// Muestra cada categoría en el desplegable.
        }

        ?>
    </select>
    </label>
    <button type="submit" name="afegirProducteACategoria">Afegir Producte a Categoria</button>
</form>

<div class="product-list">
    <h2>Llistat de Productes</h2>
    <?php
    if (!empty($_SESSION['productes'])) { // Verifica si hay productos en la sesión.
        mostrarProductes($_SESSION['productes']); // Muestra los productos.
    } else {
        echo "<p>No hi ha productes afegits.</p>"; // Muestra un mensaje si no hay productos.
    }
    ?>
</div>

<div class="category-list">
    <h2>Llistat de Categories</h2>
    <?php
    if (!empty($_SESSION['categories'])) { // Verifica si hay categorías en la sesión.
        foreach ($_SESSION['categories'] as $categoria) { // Recorre las categorías en la sesión.
            echo "<div class='category-item'>";
            echo "<p><strong>Nom:</strong> " . htmlspecialchars($categoria->getNom()) . "</p>"; // Muestra el nombre de la categoría.
            echo "<p><strong>Descripció:</strong> " . htmlspecialchars($categoria->getDescripcio()) . "</p>"; // Muestra la descripción de la categoría.
            echo "</div>";
        }
    } else {
        echo "<p>No hi ha categories afegides.</p>"; // Muestra un mensaje si no hay categorías.
    }
    ?>
</div>

<div class="combined-list">
    <h2>Productes per Categoria</h2>
    <?php
    if (!empty($_SESSION['categories'])) { // Verifica si hay categorías en la sesión.
        foreach ($_SESSION['categories'] as $categoria) { // Recorre las categorías en la sesión.
            echo "<div class='category-item'>";
            echo "<h3>" . htmlspecialchars($categoria->getNom()) . "</h3>"; // Muestra el nombre de la categoría.
            echo "<p><strong>Descripció:</strong> " . htmlspecialchars($categoria->getDescripcio()) . "</p>"; // Muestra la descripción de la categoría.

            // Muestra los productos asociados a la categoría.
            echo "<h4>Productes associats:</h4>";
            $productesAssociats = array_filter($_SESSION['productes'], function($producte) use ($categoria) { // Filtra los productos asociados a la categoría.
                return in_array($categoria, $producte->getCategories());
            });
            if (!empty($productesAssociats)) { // Verifica si hay productos asociados.
                echo "<ul>";
                foreach ($productesAssociats as $producte) { // Recorre los productos asociados.
                    echo "<li>" . htmlspecialchars($producte->getNom()) . " - " . htmlspecialchars($producte->getDescripcio()) . " - " . htmlspecialchars($producte->getPreu()) . " €</li>"; // Muestra cada producto asociado.
                }
                echo "</ul>";
            } else {
                echo "<p>No hi ha productes associats a aquesta categoria.</p>"; // Muestra un mensaje si no hay productos asociados.
            }
            echo "</div>";
        }
    } else {
        echo "<p>No hi ha categories afegides.</p>"; // Muestra un mensaje si no hay categorías.
    }
    ?>
</div>

</body>
</html>