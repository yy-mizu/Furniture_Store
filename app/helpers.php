<?php function convertCategoryToProductCode($category)
{
    // Split the category string by spaces
    $parts = explode(' ', $category);

    // Initialize an empty string for the product code
    $productCode = '';

    // Loop through the parts and append the first and last characters of each part to the product code
    foreach ($parts as $part) {
        // Append the first character of the part
        $productCode .= strtoupper(substr($part, 0, 1));

        // Get the length of the part
        $length = strlen($part);

        // If the length of the part is greater than 1, append the last character
        if ($length > 1) {
            // Append the last character of the part
            $productCode .= strtoupper(substr($part, -1));
        }
    }

    // Append a hyphen at the end of the product code
    $productCode .= '-';

    return $productCode;
}
