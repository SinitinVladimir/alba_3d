import './style.css'; 
import * as THREE from 'three'; 
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js'; 
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js'; // Import OrbitControls


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

// Background

const spaceTexture = new THREE.TextureLoader().load('space.jpeg');
scene.background = spaceTexture;

// Camera target positions
const positions = [
  new THREE.Vector3(-1 ,160, 0), // Position 0
  new THREE.Vector3(-4, 12, 9), // CC
  new THREE.Vector3(-1 ,60, 0), // Position 0
  new THREE.Vector3(-6, 12, 6), // Crest
  new THREE.Vector3(-1 ,60, 0), // Position 0
  new THREE.Vector3(3, 15, 6), // Sal Un
  new THREE.Vector3(-1 ,60, 0), // Position 0
  new THREE.Vector3(0, 15, 6), // Muz
  new THREE.Vector3(-1 ,60, 0), // Position 0
  new THREE.Vector3(3, 13, 4),   //Muz  princ 
  new THREE.Vector3(-1 ,60, 0), // Position 0
  new THREE.Vector3(3, 15, 6), // Sal Un
  new THREE.Vector3(-1 ,60, 0), // Position 0
  new THREE.Vector3(-6, 12, 6), // Crest
  new THREE.Vector3(-1 ,60, 0), // Position 0
  new THREE.Vector3(3, 15, 6), // Sal Un
  new THREE.Vector3(-1 ,60, 0), // Position 0
  new THREE.Vector3(0, 15, 6), // Muz
  new THREE.Vector3(-1 ,60, 0), // Position 0
  new THREE.Vector3(3, 13, 4),   //Muz  princ 
  new THREE.Vector3(-1 ,60, 0), // Position 0
  new THREE.Vector3(3, 15, 6), // Sal Un
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

window.addEventListener('click', () => {
  manualControl = !manualControl; // Toggle control mode on click
  controls.enabled = manualControl; // Enable or disable orbit controls based on the mode
  if (!manualControl) {
    camera.position.lerp(positions[currentTargetIndex], 0); // Reset position if exiting manual control
  }
});

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

document.addEventListener("wheel", function(e) {
  // Prevent default scroll behavior
  e.preventDefault();
  
  // Determine the scroll direction
  let delta = e.deltaY > 0 ? 1 : -1;
  let activeElement = document.querySelector('.location[visible]');
  let newIndex = [...document.querySelectorAll('.location')].indexOf(activeElement) + delta;

  // Ensure the newIndex wraps around the collection of articles
  let articles = document.querySelectorAll('.location');
  newIndex = (newIndex + articles.length) % articles.length;

  // Scroll into the new article
  articles[newIndex].scrollIntoView({ behavior: 'smooth' });
});



// // Animation loop (GAME LOOP)
// function animate() {
//   requestAnimationFrame(animate); // request the next frame
//   camera.position.lerp(positions[currentTargetIndex], 0.009); // smoothly interpolating camera position on the map
//   camera.lookAt(scene.position); // maintain focus at the center of the map
//   renderer.render(scene, camera); // Rendering
// }

function animate() {
  requestAnimationFrame(animate);
  
  // Interpolate camera position smoothly towards the target
  const targetPosition = positions[currentTargetIndex];
  camera.position.lerp(targetPosition, 0.05); // Adjust lerp factor for smoothness
  camera.lookAt(scene.position); // Always look at the scene center or adjust as needed

  renderer.render(scene, camera);
}

