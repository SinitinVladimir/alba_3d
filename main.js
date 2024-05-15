import './style.css'; 
import * as THREE from 'three'; 
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js'; 

const scene = new THREE.Scene(); // creating scene

// setting up the camera perspective-view
const camera = new THREE.PerspectiveCamera(
  30, // field of view in degrees
  window.innerWidth / window.innerHeight, // Aspect ratio
  0.1, // near clipping plane
  1000 // far clipping plane
);
camera.position.set(0, 100, 0); //  camera initial position above the scene
camera.lookAt(0, 0, 0); // setting the camera look at the center of the scene

// WebGL renderer
const renderer = new THREE.WebGLRenderer({
  canvas: document.querySelector('#bg'), // binding rendering to an existing canvas
});
renderer.setPixelRatio(window.devicePixelRatio); // setting the display's pixel ratio
renderer.setSize(window.innerWidth, window.innerHeight); // setting up fullscreen renderer

// Lighting
const directionalLight = new THREE.DirectionalLight(0xffffff, 1); // white directional
directionalLight.position.set(0, 1, 0); // above the map
scene.add(directionalLight);
const ambientLight = new THREE.AmbientLight(0xffffff, 0.5); // soft white lights
scene.add(ambientLight);

// Camera target positions
const positions = [
  new THREE.Vector3(10, 10, 20), // Position 1
  new THREE.Vector3(10, 100, 20), // 2
  new THREE.Vector3(-10, 10, -20), // 3
  new THREE.Vector3(60, 100, 25),   // 4  
  new THREE.Vector3(10, 10, 5), // 5
  new THREE.Vector3(10, 100, 20), // 6
  new THREE.Vector3(-4, 10, -6), // 7
  new THREE.Vector3(60, 100, 25)   // 8

];
let currentTargetIndex = 0; // initial position

// Loading the 3D model (map)
const loader = new GLTFLoader();
loader.load(
  '/models/apulumMap.glb',
  (gltf) => {
    scene.add(gltf.scene); // Adding the loaded model to the scene
    camera.lookAt(gltf.scene.position); // adjusting the camera to look at the model
    animate(); // run the animation loop
  },
  (xhr) => console.log(`${(xhr.loaded / xhr.total * 100)}% loaded`), // progress log in case of long loadiang
  (error) => console.error('An error happened', error) // error log
);

// event listener for mouse wheel scrolling
window.addEventListener('wheel', (event) => {
  const direction = Math.sign(event.deltaY); // scroll direction check
  currentTargetIndex += direction; // index up or down
  if (currentTargetIndex >= positions.length) { // to the start
    currentTargetIndex = 0;
  } else if (currentTargetIndex < 0) { // to the end
    currentTargetIndex = positions.length - 1;
  }
});

// Animation loop (GAME LOOP)
function animate() {
  requestAnimationFrame(animate); // request the next frame
  camera.position.lerp(positions[currentTargetIndex], 0.009); // smoothly interpolating camera position on the map
  camera.lookAt(scene.position); // maintain focus at the center of the map
  renderer.render(scene, camera); // Rendering
}

// // Fetch and display locations
// fetch('./locations.php')
//   .then(response => response.json())
//   .then(data => {
//     const locationsContainer = document.getElementById('locations');
//     data.forEach(location => {
//       const locationElement = document.createElement('div');
//       locationElement.classList.add('location');

//       locationElement.innerHTML = `
//         <h2>${location.name}</h2>
//         <p>${location.description}</p>
//         <p><strong>Ticket Price:</strong> ${location.ticket_price_range}</p>
//         <p><strong>Visiting Hours:</strong> ${location.visiting_hours}</p>
//         <p><a href="${location.webpage}" target="_blank">More Info</a></p>
//         <p><a href="${location.google_maps}" target="_blank">View on Map</a></p>
//         ${location.social_media ? `<p><a href="${location.social_media}" target="_blank">Social Media</a></p>` : ''}
//       `;

//       locationsContainer.appendChild(locationElement);
//     });
//   })
//   .catch(error => console.error('Error fetching locations:', error));

window.addEventListener('wheel', (event) => {
  const direction = Math.sign(event.deltaY);
  currentTargetIndex += direction;
  if (currentTargetIndex >= positions.length) {
    currentTargetIndex = 0;
  } else if (currentTargetIndex < 0) {
    currentTargetIndex = positions.length - 1;
  }
  camera.position.lerp(positions[currentTargetIndex], 0.1);
});