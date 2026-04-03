/* 
* webgl.js 
* Handles Three.js 3D Background for Hero Section
*/

document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('webgl-container');
    if (!container) return;

    // Scene Setup
    const scene = new THREE.Scene();
    
    // Abstract Medical/Educational BG - Let's use floating particles that look like cells/molecules
    // Fog for depth
    scene.fog = new THREE.FogExp2(0x0A2540, 0.001);

    // Camera Setup
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.z = 30;

    // Renderer Setup
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);

    // Lights
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
    scene.add(ambientLight);

    const pointLight = new THREE.PointLight(0x0076D6, 2, 100);
    pointLight.position.set(10, 10, 10);
    scene.add(pointLight);

    const pointLight2 = new THREE.PointLight(0xFFB800, 1, 100);
    pointLight2.position.set(-10, -10, 10);
    scene.add(pointLight2);

    // Group for objects
    const particles = new THREE.Group();
    scene.add(particles);

    // Simple geometry: Icosahedrons (looks a bit like stylized cells/molecules)
    const geometry = new THREE.IcosahedronGeometry(1, 0);
    
    // Create multiple materials (Blue and Gold)
    const materialBlue = new THREE.MeshPhysicalMaterial({ 
        color: 0x0076D6, 
        metalness: 0.1,
        roughness: 0.5,
        transmission: 0.9, // glass-like
        thickness: 0.5
    });

    const materialGold = new THREE.MeshStandardMaterial({ 
        color: 0xFFB800, 
        metalness: 0.8,
        roughness: 0.2
    });

    // Generate random objects
    for (let i = 0; i < 60; i++) {
        const material = Math.random() > 0.8 ? materialGold : materialBlue;
        const mesh = new THREE.Mesh(geometry, material);
        
        // Random position
        mesh.position.x = (Math.random() - 0.5) * 60;
        mesh.position.y = (Math.random() - 0.5) * 60;
        mesh.position.z = (Math.random() - 0.5) * 40;
        
        // Random rotation
        mesh.rotation.x = Math.random() * Math.PI;
        mesh.rotation.y = Math.random() * Math.PI;
        
        // Random scale (size variation)
        const scale = Math.random() * 1.5 + 0.5;
        mesh.scale.set(scale, scale, scale);
        
        particles.add(mesh);
    }

    // Animation Loop
    const clock = new THREE.Clock();

    function animate() {
        requestAnimationFrame(animate);

        const elapsedTime = clock.getElapsedTime();

        // Very slow, ambient rotation of the entire particle group
        particles.rotation.y = elapsedTime * 0.05;
        particles.rotation.z = Math.sin(elapsedTime * 0.02) * 0.1;

        // Animate individual meshes
        particles.children.forEach((mesh, index) => {
            mesh.rotation.x += 0.005;
            mesh.rotation.y += 0.01;
            
            // Subtle floating effect
            mesh.position.y += Math.sin(elapsedTime * 0.5 + index) * 0.02;
        });

        renderer.render(scene, camera);
    }

    animate();

    // Mouse Interaction (Parallax Effect)
    let mouseX = 0;
    let mouseY = 0;
    let targetX = 0;
    let targetY = 0;

    const windowHalfX = window.innerWidth / 2;
    const windowHalfY = window.innerHeight / 2;

    document.addEventListener('mousemove', (event) => {
        mouseX = (event.clientX - windowHalfX) * 0.01;
        mouseY = (event.clientY - windowHalfY) * 0.01;
    });

    // Apply parallax inside the animate loop (modified locally in requestAnimationFrame)
    function parallaxAnimate() {
        requestAnimationFrame(parallaxAnimate);
        
        targetX = mouseX * 0.5;
        targetY = mouseY * 0.5;
        
        particles.rotation.x += 0.05 * (targetY - particles.rotation.x);
        particles.rotation.y += 0.05 * (targetX - particles.rotation.y);
    }
    
    // Keep it simple and combine
    gsap.ticker.add(() => {
       // We can use GSAP Ticker for smoother integration if we wanted, 
       // but requestAnimationFrame is fine for Three.js.
    });

    // Make Scene Responsive
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
});
