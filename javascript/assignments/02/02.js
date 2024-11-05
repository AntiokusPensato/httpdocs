(function() {
let lumber = {
    thickness: 1,
    width: 3,
    length: 21,
    calculateBoardFeet() {
        return (this.thickness * this.width * this.length) / 144;
    }
};

const dimensionsCell = document.getElementById('dimensions');
const boardFeetCell = document.getElementById('boardFeet');

dimensionsCell.textContent = `${lumber.thickness}" x ${lumber.width}" x ${lumber.length}"`;

const boardFeet = lumber.calculateBoardFeet();
boardFeetCell.textContent = boardFeet;
})();