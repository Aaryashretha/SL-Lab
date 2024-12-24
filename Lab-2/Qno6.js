function daysUntilChristmas() {
    const today = new Date();
    const nextChristmas = new Date(today.getFullYear(), 11, 25); // December 25th
    if (today > nextChristmas) {
        nextChristmas.setFullYear(today.getFullYear() + 1); // Christmas next year
    }
    const oneDay = 1000 * 60 * 60 * 24; // Milliseconds in a day
    return Math.ceil((nextChristmas - today) / oneDay);
}

// Example usage:
console.log(`Days until next Christmas: ${daysUntilChristmas()}`);