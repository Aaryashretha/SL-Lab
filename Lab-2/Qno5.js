function getCurrentDate() {
    const today = new Date();
    const day = String(today.getDate()).padStart(2, '0');
    const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-based
    const year = today.getFullYear();

    return {
        'mm-dd-yyyy': `${month}-${day}-${year}`,
        'mm/dd/yyyy': `${month}/${day}/${year}`,
        'dd-mm-yyyy': `${day}-${month}-${year}`,
        'dd/mm/yyyy': `${day}/${month}/${year}`,
        'yyyy month date day': `${year} ${today.toLocaleString('default', { month: 'long' })} ${day} ${today.toLocaleString('default', { weekday: 'long' })}`
    };
}

// Example usage:
const dates = getCurrentDate();
console.log(dates['mm-dd-yyyy']); 
console.log(dates['mm/dd/yyyy']); 
console.log(dates['dd-mm-yyyy']);
console.log(dates['dd/mm/yyyy']); 
console.log(dates['yyyy month date day']);