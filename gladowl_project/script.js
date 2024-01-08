document.addEventListener('DOMContentLoaded', function() {
    fetchCollegesData();
  });
  
  function fetchCollegesData() {
    fetch('colleges_list.php')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(data => displayColleges(data))
      .catch(error => console.error('Error fetching colleges:', error.message));
  }
  
  function displayColleges(colleges) {
    const collegesContainer = document.getElementById('colleges-container');
  
    // Check if there are colleges in the result
    if (colleges.length > 0) {
      colleges.forEach(college => {
        const collegeCard = document.createElement('div');
        collegeCard.className = 'college-card';
        collegeCard.innerHTML = `
          <h3>${college.collegeName}</h3>
          <p><strong>Address:</strong> ${college.Address}</p>
          <p><strong>Contact Person:</strong> ${college.ContactPerson}</p>
          <p><strong>Email:</strong> ${college['mail-id']}</p>
        `;
  
        // Add a click event listener to each card
        collegeCard.addEventListener('click', function() {
          // You can define the action when a card is clicked here
          // For example, redirect to a detailed view or perform some other action
          console.log(`Clicked on ${college.collegeName}`);
        });
  
        collegesContainer.appendChild(collegeCard);
      });
    } else {
      collegesContainer.innerHTML = '<p>No colleges found.</p>';
    }
  }
  
  function goToAddCollegePage() {
    window.location.href = 'addCollege.html';
  }
  