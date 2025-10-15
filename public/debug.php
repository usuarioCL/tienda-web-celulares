<?php
echo "<h1>Diagnóstico de la aplicación</h1>";

// Verificar variables de entorno
echo "<h2>Variables de entorno:</h2>";
echo "DB_HOST: " . ($_SERVER['database_default_hostname'] ?? 'No configurada') . "<br>";
echo "DB_DATABASE: " . ($_SERVER['database_default_database'] ?? 'No configurada') . "<br>";
echo "DB_USER: " . ($_SERVER['database_default_username'] ?? 'No configurada') . "<br>";

// Intentar conexión a la base de datos
echo "<h2>Prueba de conexión a BD:</h2>";
try {
    $host = $_SERVER['database_default_hostname'] ?? 'tienda-celular-server.mysql.database.azure.com';
    $db = $_SERVER['database_default_database'] ?? 'tiendaCelular';
    $user = $_SERVER['database_default_username'] ?? 'eduardoCL';
    $pass = $_SERVER['database_default_password'] ?? '75694349$E';
    
    $options = [
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
        PDO::MYSQL_ATTR_SSL_CA => null
    ];
    $pdo = new PDO("mysql:host=$host;dbname=$db;port=3306", $user, $pass, $options);
    echo "✅ Conexión exitosa a la base de datos<br>";
    
    // Verificar si existe la tabla celulares
    $result = $pdo->query("SHOW TABLES LIKE 'celulares'");
    if ($result->rowCount() > 0) {
        echo "✅ Tabla 'celulares' existe<br>";
        
        // Contar registros
        $count = $pdo->query("SELECT COUNT(*) FROM celulares")->fetchColumn();
        echo "📊 Registros en tabla celulares: $count<br>";
    } else {
        echo "❌ Tabla 'celulares' no existe<br>";
    }
    
} catch (Exception $e) {
    echo "❌ Error de conexión: " . $e->getMessage() . "<br>";
}

echo "<br><a href='/'>Volver al inicio</a>";
?>