<?php
// require_once 'models/catalog.json';

/**
 * Retorna el catálogo completo
 * @return array
 */
function getAll(): array
{
    $jsonContent = file_get_contents( 'models/catalog.json');

    if ($jsonContent === false) {
        throw new Exception("No se pudo leer el archivo del catálogo");
    }

    $catalogData = json_decode($jsonContent, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Error al decodificar el JSON: " . json_last_error_msg());
    }

    // Combinamos escudos y espadas en un solo array
    $allItems = array_merge($catalogData['escudos'] ?? [], $catalogData['espadas'] ?? []);

    return $allItems;
}

/**
 * Retorna un producto coincidente con el id proporcionado
 * @param int $id ID del producto a buscar
 * @return array
 */
function getById(int $id): mixed
{
    $jsonContent = file_get_contents('models/catalog.json');

    if ($jsonContent === false) {
        throw new Exception("No se pudo leer el archivo del catálogo");
    }

    $catalogData = json_decode($jsonContent, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Error al decodificar el JSON: " . json_last_error_msg());
    }

    // Buscar en todos los items (escudos y espadas)
    foreach ($catalogData['escudos'] as $item) {
        if (isset($item['id']) && $item['id'] === $id) {
            return $item;
        }
    }

    foreach ($catalogData['espadas'] as $item) {
        if (isset($item['id']) && $item['id'] === $id) {
            return $item;
        }
    }
    return null;
}

/**
 * Retorna productos coincidentes con la categoría proporcionada
 * @param string $category Categoría a buscar
 * @return array
 */
function getByCategory(string $category): array
{
    $jsonContent = file_get_contents('models/catalog.json'); // Asegúrate de que la ruta es correcta

    if ($jsonContent === false) {
        throw new Exception("No se pudo leer el archivo del catálogo");
    }

    $catalogData = json_decode($jsonContent, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Error al decodificar el JSON: " . json_last_error_msg());
    }

    $result = [];
    $categoryLower = strtolower($category);

    // Buscar en todos los items (escudos y espadas)
    foreach ($catalogData['escudos'] as $item) {
        if (isset($item['tipo']) && strtolower($item['tipo']) === $categoryLower) {
            $result[] = $item;
        }
    }

    foreach ($catalogData['espadas'] as $item) {
        if (isset($item['tipo']) && strtolower($item['tipo']) === $categoryLower) {
            $result[] = $item;
        }
    }

    if (empty($result)) {
        throw new Exception("No se encontraron productos en la categoría: $category");
    }

    return $result;
}

/**
 * Función adicional sugerida: Búsqueda por tipo (arma/escudo)
 * @param string $type Tipo a buscar ('arma' o 'escudo')
 * @return array
 */
function getByType(string $type): array
{
    $jsonPath = __DIR__ . '/models/catalog.json';
    $jsonContent = file_get_contents($jsonPath);

    if ($jsonContent === false) {
        throw new Exception("No se pudo leer el archivo del catálogo");
    }

    $catalogData = json_decode($jsonContent, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Error al decodificar el JSON: " . json_last_error_msg());
    }

    $typeLower = strtolower($type);

    if ($typeLower === 'escudo') {
        return $catalogData['escudos'] ?? [];
    } elseif ($typeLower === 'arma') {
        return $catalogData['espadas'] ?? [];
    }

    throw new Exception("Tipo no válido. Use 'arma' o 'escudo'");
}
