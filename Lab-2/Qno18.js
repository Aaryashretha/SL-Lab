function dateDifference(date1, date2) {
    const diffTime = Math.abs(new Date(date2) - new Date(date1));
    return Math.ceil(diffTime / (1000 * 60 * 60 * 24));
}

// Example usage:
console.log(dateDifference('2024-12-16', '2024-12-25'));