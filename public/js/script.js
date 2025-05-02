// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", () => {
  // Navbar scroll effect
  const navbar = document.querySelector(".navbar")

  if (navbar) {
    window.addEventListener("scroll", () => {
      if (window.scrollY > 50) {
        navbar.classList.add("navbar-scrolled", "shadow-sm")
      } else {
        navbar.classList.remove("navbar-scrolled", "shadow-sm")
      }
    })
  }

  // Initialize tooltips
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl))

  // Smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault()

      const targetId = this.getAttribute("href")
      if (targetId === "#") return

      const targetElement = document.querySelector(targetId)
      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: "smooth",
        })
      }
    })
  })
})

// Form validation for contact form
function validateForm(formId) {
  const form = document.getElementById(formId)

  if (!form) return false

  let isValid = true
  const inputs = form.querySelectorAll("input[required], textarea[required], select[required]")

  inputs.forEach((input) => {
    if (!input.value.trim()) {
      input.classList.add("is-invalid")
      isValid = false
    } else {
      input.classList.remove("is-invalid")
    }

    // Email validation
    if (input.type === "email" && input.value) {
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
      if (!emailPattern.test(input.value)) {
        input.classList.add("is-invalid")
        isValid = false
      }
    }
  })

  return isValid
}

// Login functionality
function login() {
  const email = document.getElementById("loginEmail").value
  const password = document.getElementById("loginPassword").value

  // In a real application, this would be an API call
  // For demo purposes, we'll use localStorage to simulate user authentication
  const users = JSON.parse(localStorage.getItem("users")) || []
  const user = users.find((u) => u.email === email && u.password === password)

  if (user) {
    localStorage.setItem("currentUser", JSON.stringify(user))

    // Redirect based on user role
    if (user.role === "admin") {
      window.location.href = "admin/dashboard.html"
    } else if (user.role === "faculty") {
      window.location.href = "faculty/dashboard.html"
    } else {
      window.location.href = "student/dashboard.html"
    }
  } else {
    // Show error message
    const errorMsg = document.getElementById("loginError")
    if (errorMsg) {
      errorMsg.textContent = "Invalid email or password"
      errorMsg.style.display = "block"
    }
  }

  return false
}

// Registration functionality
function register() {
  if (!validateForm("registrationForm")) {
    return false
  }

  const name = document.getElementById("regName").value
  const email = document.getElementById("regEmail").value
  const password = document.getElementById("regPassword").value
  const level = document.getElementById("regLevel").value

  // In a real application, this would be an API call
  // For demo purposes, we'll use localStorage
  const users = JSON.parse(localStorage.getItem("users")) || []

  // Check if user already exists
  if (users.some((user) => user.email === email)) {
    const errorMsg = document.getElementById("regError")
    if (errorMsg) {
      errorMsg.textContent = "Email already registered"
      errorMsg.style.display = "block"
    }
    return false
  }

  // Create new user
  const newUser = {
    id: Date.now().toString(),
    name,
    email,
    password,
    level,
    role: "student",
    registrationDate: new Date().toISOString(),
    approved: false,
  }

  users.push(newUser)
  localStorage.setItem("users", JSON.stringify(users))

  // Show success message and redirect to payment page
  alert("Registration successful! Redirecting to payment page.")
  window.location.href = "payment.html?userId=" + newUser.id

  return false
}

// Faculty application
function applyAsFaculty() {
  if (!validateForm("facultyApplicationForm")) {
    return false
  }

  const name = document.getElementById("facName").value
  const email = document.getElementById("facEmail").value
  const phone = document.getElementById("facPhone").value
  const experience = document.getElementById("facExperience").value
  const specialization = document.getElementById("facSpecialization").value

  // In a real application, this would be an API call
  // For demo purposes, we'll use localStorage
  const facultyApplications = JSON.parse(localStorage.getItem("facultyApplications")) || []

  // Check if application already exists
  if (facultyApplications.some((app) => app.email === email)) {
    const errorMsg = document.getElementById("facError")
    if (errorMsg) {
      errorMsg.textContent = "You have already applied"
      errorMsg.style.display = "block"
    }
    return false
  }

  // Create new application
  const newApplication = {
    id: Date.now().toString(),
    name,
    email,
    phone,
    experience,
    specialization,
    applicationDate: new Date().toISOString(),
    status: "pending",
  }

  facultyApplications.push(newApplication)
  localStorage.setItem("facultyApplications", JSON.stringify(facultyApplications))

  // Show success message
  alert("Application submitted successfully! We will contact you soon.")
  window.location.href = "index.html"

  return false
}

// Admin functionality - approve student
function approveStudent(userId) {
  const users = JSON.parse(localStorage.getItem("users")) || []
  const userIndex = users.findIndex((user) => user.id === userId)

  if (userIndex !== -1) {
    users[userIndex].approved = true
    localStorage.setItem("users", JSON.stringify(users))
    alert("Student approved successfully!")
    loadStudents() // Refresh the student list
  }
}

// Admin functionality - approve faculty
function approveFaculty(applicationId) {
  const applications = JSON.parse(localStorage.getItem("facultyApplications")) || []
  const appIndex = applications.findIndex((app) => app.id === applicationId)

  if (appIndex !== -1) {
    // Update application status
    applications[appIndex].status = "approved"
    localStorage.setItem("facultyApplications", JSON.stringify(applications))

    // Create faculty user account
    const app = applications[appIndex]
    const users = JSON.parse(localStorage.getItem("users")) || []

    const newFaculty = {
      id: Date.now().toString(),
      name: app.name,
      email: app.email,
      password: "faculty123", // Default password, should be changed
      role: "faculty",
      specialization: app.specialization,
      experience: app.experience,
      registrationDate: new Date().toISOString(),
      approved: true,
    }

    users.push(newFaculty)
    localStorage.setItem("users", JSON.stringify(users))

    alert("Faculty approved successfully!")
    loadFacultyApplications() // Refresh the applications list
  }
}

// Admin functionality - upload content
function uploadContent(type) {
  const title = document.getElementById(type + "Title").value
  const description = document.getElementById(type + "Description").value
  const file = document.getElementById(type + "File").files[0]

  if (!title || !description || !file) {
    alert("Please fill all fields and select a file")
    return false
  }

  // In a real application, this would upload to a server
  // For demo purposes, we'll use localStorage
  const content = JSON.parse(localStorage.getItem(type + "Content")) || []

  // Create new content item
  const newContent = {
    id: Date.now().toString(),
    title,
    description,
    fileName: file.name,
    uploadDate: new Date().toISOString(),
    type: type, // 'photo' or 'video'
  }

  content.push(newContent)
  localStorage.setItem(type + "Content", JSON.stringify(content))

  alert(type.charAt(0).toUpperCase() + type.slice(1) + " uploaded successfully!")
  document.getElementById(type + "UploadForm").reset()

  // Refresh content list if function exists
  if (typeof loadContent === "function") {
    loadContent(type)
  }

  return false
}

// Load gallery content
function loadGalleryContent() {
  loadPhotos()
  loadVideos()
}

// Load photos for gallery
function loadPhotos() {
  const photoContainer = document.getElementById("photoGallery")
  if (!photoContainer) return

  const photos = JSON.parse(localStorage.getItem("photoContent")) || []

  if (photos.length === 0) {
    // Add some demo photos if none exist
    const demoPhotos = [
      { id: "1", title: "Navratri Celebration", description: "Annual Navratri event", fileName: "navratri.jpg" },
      { id: "2", title: "Workshop Session", description: "Beginner workshop", fileName: "workshop.jpg" },
      { id: "3", title: "Competition Winners", description: "Winners of annual competition", fileName: "winners.jpg" },
    ]

    photoContainer.innerHTML = demoPhotos
      .map(
        (photo) => `
            <div class="col-md-4 mb-4">
                <div class="card gallery-card h-100">
                    <img src="https://placeholder.svg?height=300&width=400" class="card-img-top" alt="${photo.title}">
                    <div class="card-body">
                        <h5 class="card-title">${photo.title}</h5>
                        <p class="card-text">${photo.description}</p>
                    </div>
                </div>
            </div>
        `,
      )
      .join("")
  } else {
    photoContainer.innerHTML = photos
      .map(
        (photo) => `
            <div class="col-md-4 mb-4">
                <div class="card gallery-card h-100">
                    <img src="https://placeholder.svg?height=300&width=400" class="card-img-top" alt="${photo.title}">
                    <div class="card-body">
                        <h5 class="card-title">${photo.title}</h5>
                        <p class="card-text">${photo.description}</p>
                    </div>
                </div>
            </div>
        `,
      )
      .join("")
  }
}

// Load videos for gallery
function loadVideos() {
  const videoContainer = document.getElementById("videoGallery")
  if (!videoContainer) return

  const videos = JSON.parse(localStorage.getItem("videoContent")) || []

  if (videos.length === 0) {
    // Add some demo videos if none exist
    const demoVideos = [
      { id: "1", title: "Basic Garba Steps", description: "Learn the fundamental steps", fileName: "basics.mp4" },
      { id: "2", title: "Advanced Choreography", description: "Professional level routine", fileName: "advanced.mp4" },
      {
        id: "3",
        title: "Performance Highlights",
        description: "Best moments from our shows",
        fileName: "highlights.mp4",
      },
    ]

    videoContainer.innerHTML = demoVideos
      .map(
        (video) => `
            <div class="col-md-6 mb-4">
                <div class="card gallery-card h-100">
                    <div class="video-container">
                        <img src="https://placeholder.svg?height=300&width=500" class="card-img-top" alt="${video.title}">
                        <div class="play-button">
                            <i class="fas fa-play-circle fa-3x"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${video.title}</h5>
                        <p class="card-text">${video.description}</p>
                    </div>
                </div>
            </div>
        `,
      )
      .join("")
  } else {
    videoContainer.innerHTML = videos
      .map(
        (video) => `
            <div class="col-md-6 mb-4">
                <div class="card gallery-card h-100">
                    <div class="video-container">
                        <img src="https://placeholder.svg?height=300&width=500" class="card-img-top" alt="${video.title}">
                        <div class="play-button">
                            <i class="fas fa-play-circle fa-3x"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${video.title}</h5>
                        <p class="card-text">${video.description}</p>
                    </div>
                </div>
            </div>
        `,
      )
      .join("")
  }
}

// Dummy functions to satisfy the calls. In a real application, these would be properly implemented.
function loadStudents() {
  console.log("loadStudents function called")
}

function loadFacultyApplications() {
  console.log("loadFacultyApplications function called")
}

function loadContent(type) {
  console.log("loadContent function called with type: ", type)
}

// Declare bootstrap variable
const bootstrap = window.bootstrap

