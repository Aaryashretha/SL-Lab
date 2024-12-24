function countVowels(str) {
    const vowels = 'aeiouAEIOU';
    return str.split('').filter(char => vowels.includes(char)).length;
}
console.log(countVowels('webmaster')); // Output: 3
console.log(countVowels('JavaScript')); // Output: 3
