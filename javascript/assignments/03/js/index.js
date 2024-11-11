window.onload = function () {
  // Assign div#page to variable
  const page = document.getElementById("page");

  // Assign all P elements to variable
  const paragraphs = document.getElementsByTagName("p");

  // Create new element UL
  const ul = document.createElement("ul");

  // Create one for loop – loop through array of P elements
  let coolCount = 0;
  for (let i = 0; i < paragraphs.length; i++) {
    // In same for loop – create new element LI and place P text in LI
    const li = document.createElement("li");
    li.textContent = paragraphs[i].textContent;
    // In same for loop – Assign class names to LIs
    // First and Last LI use class: complete
    // use logic to determine if first or last LI
    // do not hard code first or last LI
    // if index value (i) is equal to 0 or index value (i) is length of array -1
    // set class to complete
    // All other LIs use class: cool
    if (i === 0 || i === paragraphs.length - 1) {
      li.className = "complete";
    } else {
      li.className = "cool";
      coolCount++; // Counts items with class of cool
    }
    // In same for loop – Add new LI to new UL element
    ul.appendChild(li);
  }

  // Add UL/LIs to div#page
  page.appendChild(ul);

  // Remove original P elements from the DOM
  while (paragraphs.length > 0) {
    paragraphs[0].parentNode.removeChild(paragraphs[0]);
  }

  // Add text to the H2 element
  // show existing H2 text followed by:
  // Number – Items Remaining
  const h2 = document.querySelector("h2");
  h2.textContent = `ToDo List: ${coolCount} - Items Remaining`;

  // Add text to TITLE element show:
  // Number – Items Remaining
  // followed by existing content
  document.title = `${coolCount} - Items Remaining a03`;
};
