// import './style.css';
import * as THREE from 'three';
import { GLTFLoader } from './node_modules/three/examples/jsm/loaders/GLTFLoader.js';
import { OrbitControls } from './node_modules/three/examples/jsm/controls/OrbitControls.js';









const scene = new THREE.Scene();

// Camera setup
const camera = new THREE.PerspectiveCamera(30, window.innerWidth / window.innerHeight, 0.1, 1000);
camera.position.set(0, 100, 0);
camera.lookAt(0, 0, 0);

// WebGL renderer
const renderer = new THREE.WebGLRenderer({
    canvas: document.querySelector('#bg'),
});
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(window.innerWidth, window.innerHeight);

// Lighting
const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
directionalLight.position.set(0, 1, 0);
scene.add(directionalLight);
const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
scene.add(ambientLight);

// Background
const spaceTexture = new THREE.TextureLoader().load('/space.jpeg');
scene.background = spaceTexture;

// OrbitControls
const controls = new OrbitControls(camera, renderer.domElement);
controls.enableDamping = true;
controls.dampingFactor = 0.25;
controls.enableZoom = true;
controls.enablePan = true;
controls.enableRotate = true;
controls.update();

// Loading the 3D model (map)
const loader = new GLTFLoader();
loader.load('/models/apulumMap.glb', (gltf) => {
    scene.add(gltf.scene);
    camera.lookAt(gltf.scene.position);
    animate();
}, (xhr) => console.log(`${(xhr.loaded / xhr.total * 100)}% loaded`), (error) => console.error('An error happened', error));

// Update camera position display
const cameraPositionDisplay = document.getElementById('camera-position');
const interactionSwitch = document.getElementById('toggleMode');

let manualControl = true; // Start with manual control
let isMoving = false; // Flag to check if the camera is currently moving

function updateCameraPositionDisplay() {
    const { x, y, z } = camera.position;
    cameraPositionDisplay.textContent = `Camera Position: x=${x.toFixed(2)}, y=${y.toFixed(2)}, z=${z.toFixed(2)}`;
}

// Camera target positions and corresponding content
const positions = [
    new THREE.Vector3(-1, 160, 0),
    new THREE.Vector3(-4, 12, 9),
    new THREE.Vector3(-1, 60, 0),
    new THREE.Vector3(-6, 12, 6),
    new THREE.Vector3(-1, 60, 0),
    new THREE.Vector3(3, 15, 6),
    new THREE.Vector3(-1, 60, 0),
    new THREE.Vector3(0, 15, 6),
    new THREE.Vector3(-1, 60, 0),
    new THREE.Vector3(3, 13, 4),
];
let currentTargetIndex = 0; // initial position

interactionSwitch.addEventListener('change', () => {
    manualControl = !interactionSwitch.checked;
    controls.enabled = manualControl;
    if (!manualControl) {
        updateContent();
    }
});

function moveToPosition(targetPosition) {
    const duration = 2000; // 2 seconds
    const startPosition = new THREE.Vector3().copy(camera.position);
    const endPosition = new THREE.Vector3().copy(targetPosition);
    const startTime = performance.now();

    function animateMove() {
        const elapsedTime = performance.now() - startTime;
        const t = Math.min(elapsedTime / duration, 1); // Clamp time to [0, 1]

        camera.position.lerpVectors(startPosition, endPosition, t);
        camera.lookAt(scene.position);

        if (t < 1) {
            requestAnimationFrame(animateMove);
        } else {
            isMoving = false; // Movement finished
        }
    }

    isMoving = true;
    requestAnimationFrame(animateMove);
}

// Event listener for mouse wheel scrolling
window.addEventListener('wheel', (event) => {
    if (!manualControl && !isMoving) {
        const direction = Math.sign(event.deltaY);
        currentTargetIndex += direction;
        if (currentTargetIndex >= positions.length) {
            currentTargetIndex = 0;
        } else if (currentTargetIndex < 0) {
            currentTargetIndex = positions.length - 1;
        }
        moveToPosition(positions[currentTargetIndex]);
        updateContent();
    }
});

function updateContent() {
    const locationElements = document.querySelectorAll('.location');
    locationElements.forEach((element, index) => {
        if (index === currentTargetIndex) {
            element.style.display = 'flex';
        } else {
            element.style.display = 'none';
        }
    });
}

// Animation loop
function animate() {
    requestAnimationFrame(animate);
    if (manualControl) {
        controls.update();
    }
    renderer.render(scene, camera);
    updateCameraPositionDisplay();
}

animate();

// Handling window resize
window.addEventListener('resize', () => {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
});
