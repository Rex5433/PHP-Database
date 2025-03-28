document.addEventListener("DOMContentLoaded", function() {
    if (document.body.classList.contains("index-page")) {
        document.getElementById("fetchButton").addEventListener("click", function() {
            fetch("index.php?fetch=true")
            .then(response => response.json())
            .then(data => {
                let artistTable = document.getElementById("artistTable").getElementsByTagName("tbody")[0];
                artistTable.innerHTML = ""; 

                if (data.length > 0) {
                    data.forEach(artist => {
                        let row = artistTable.insertRow();

                        row.innerHTML = `
                            <td>${artist.ArtistID}</td>
                            <td>${artist.Name}</td>
                            <td>${artist.DateOfBirth}</td>
                            <td>${artist.Gender}</td>
                            <td>${artist.ContactInfo}</td>
                            <td>${artist.AvailabilityStatus}</td>
                        `;
                    });
                } else {
                    artistTable.innerHTML = `<tr><td colspan="4">No artists found.</td></tr>`;
                }
            })
            .catch(error => console.error("Error fetching data:", error));
        });
    }
});
