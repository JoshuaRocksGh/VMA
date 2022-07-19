function comingSoonToast(message, title, timer = 3000) {
    Swal.fire({
        title: title ?? "Coming Soon",
        text: message ?? "Stay tuned for more features",
        imageUrl: "assets/images/placeholders/coming-soon.gif",
        imageHeight: "10rem",
        width: "30rem",
        imageAlt: "success image",
        confirmButtonColor: "#0388cb",
        // timer: timer,
    });
}
