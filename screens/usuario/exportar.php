<?php
$conectar = mysql_connect('localhost', 'root', '');
if (!$conectar) {
    die("Connection failed: " . mysql_error());
}

$db = mysql_select_db('frangelato', $conectar);
if (!$db) {
    die("Database selection failed: " . mysql_error());
}

$query = "SELECT cpf, nome, tipo FROM usuario"; // Adapte a consulta conforme necessário
$result = mysql_query($query, $conectar); // Passar a conexão como segundo parâmetro

if (!$result) {
    die("Query failed: " . mysql_error()); // Captura erro na consulta
}

$usuarios = array(); // Corrigido para PHP 5.3
while ($row = mysql_fetch_assoc($result)) { // Usando mysql_fetch_assoc()
    $usuarios[] = array($row['cpf'], $row['nome'], $row['tipo']); // Usando array()
}

mysql_close($conectar); // Fechar a conexão com mysql_close()
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa receita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/db6ecd3c1f.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
    <script>
function generatePDF() {
    var props = {
        outputType: jsPDFInvoiceTemplate.Save,
        onJsPDFDocCreation: function(jsPDFDoc) {
            // Qualquer configuração adicional
        },
        compress: true,
        logo: {
            src: "",
            type: 'PNG', 
            width: 30,
            height: 30,
            margin: { top: 0, left: 0 }
        },
        stamp: {
            inAllPages: true,
            src: "https://raw.githubusercontent.com/edisonneza/jspdf-invoice-template/demo/images/qr_code.jpg",
            type: 'JPG',
            width: 20,
            height: 20,
            margin: { top: 0, left: 0 }
        },
        business: {
            name: "Frangelato",
            phone: "(48) 99964-7047",
            email: "frangelato@gmail.com",
            email_1: "Jackson Salvato França",
            website: "frangelato.com",
        },
        contact: {
            label: "organização que faz a diferença!",
        },

        // Inicializa a variável usuarios fora do objeto props
        usuarios: <?php echo json_encode($usuarios); ?>,

        invoice: {
            headerBorder: false,
            tableBodyBorder: false,
            header: [
                { title: "#", style: { width: 10 } },
                { title: "CPF", style: { width: 30 } },
                { title: "Nome", style: { width: 80 } },
                { title: "Tipo" }
            ],
            table: <?php echo json_encode(array_map(function($usuario, $index) { return array($index + 1, $usuario[0], $usuario[1], $usuario[2]); }, $usuarios, array_keys($usuarios))); ?>, // Incluindo o índice
            additionalRows: [], // Adicione linhas adicionais conforme necessário
        },
        footer: {
            text: "The invoice is created on a computer and is valid without the signature and stamp.",
        },
        pageEnable: true,
        pageLabel: "Page ",
    };

    var pdfObject = jsPDFInvoiceTemplate.default(props); // returns number of pages created
    console.log("object created", pdfObject);
}
</script>
</head>
<body>
    <button onclick="generatePDF()">Gerar PDF</button>
</body>
</html>
