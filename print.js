//print.js
function printTable(tableId, message) {
    var printContents = document.getElementById(tableId).outerHTML;
    
    // Set the width and height to match the screen dimensions
    var screenWidth = window.screen.width;
    var screenHeight = window.screen.height;
    var printWindow = window.open('', '_blank', 'width=' + screenWidth + ',height=' + screenHeight);

    var now = new Date(); // Get the current date and time
    var formattedDateTime = now.toLocaleString(); // Format the date and time as a string

    printWindow.document.open();
    printWindow.document.write('<html><head><title>Print</title>');
    printWindow.document.write('<style>');
    printWindow.document.write('table { border-collapse: collapse; width: 100%; }');
    printWindow.document.write('th, td { text-align: left; padding: 8px; }'); // Adjust padding as needed
    printWindow.document.write('</style>');
    printWindow.document.write('</head><body>');
    printWindow.document.write('<h2 style="text-align: center;">' + message + '</h2>'); // Use the dynamic message here
    printWindow.document.write('<p style="text-align: center;">Reporting Time: ' + formattedDateTime + '</p>');
    printWindow.document.write(printContents);
    printWindow.document.write('</body></html>');
    printWindow.document.close();

    printWindow.onload = function() {
        printWindow.print();
        printWindow.onafterprint = function() {
            printWindow.close();
        };
    };
}