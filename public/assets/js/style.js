
    document.getElementById("profileIcon").addEventListener("click", function() {
            const profileMenu = document.getElementById("profileMenu");
            profileMenu.style.display = profileMenu.style.display === "none" ? "block" : "none";
        });

        // Close the menu if clicking outside of it
        document.addEventListener("click", function(event) {
            const profileMenu = document.getElementById("profileMenu");
            const profileIcon = document.getElementById("profileIcon");
            if (!profileMenu.contains(event.target) && event.target !== profileIcon) {
                profileMenu.style.display = "none";
            }
        });

        