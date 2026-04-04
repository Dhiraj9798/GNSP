/*
* webgl.js
* BallCanvas-style interactive spheres for stats section.
*/

document.addEventListener('DOMContentLoaded', () => {
    if (typeof THREE === 'undefined') return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function initStatsBallCanvas(containerId) {
        const container = document.getElementById(containerId);
        if (!container) return;

        const scene = new THREE.Scene();
        scene.fog = new THREE.FogExp2(0x0b2d5b, 0.012);

        const camera = new THREE.PerspectiveCamera(52, 1, 0.1, 300);
        camera.position.z = 24;

        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        renderer.setClearColor(0x000000, 0);
        container.appendChild(renderer.domElement);

        const ambientLight = new THREE.AmbientLight(0xffffff, 0.62);
        scene.add(ambientLight);

        const keyLight = new THREE.PointLight(0x4ba3ff, 1.6, 180);
        keyLight.position.set(10, 10, 16);
        scene.add(keyLight);

        const warmLight = new THREE.PointLight(0xf9c74f, 1.15, 160);
        warmLight.position.set(-11, -8, 12);
        scene.add(warmLight);

        const group = new THREE.Group();
        scene.add(group);

        const isMobile = window.matchMedia('(max-width: 768px)').matches;
        const count = isMobile ? 9 : 16;

        const sphereGeometry = new THREE.SphereGeometry(0.72, 22, 22);
        const materials = [
            new THREE.MeshPhysicalMaterial({ color: 0x2f7fd8, roughness: 0.2, metalness: 0.35, clearcoat: 0.5, transparent: true, opacity: 0.78 }),
            new THREE.MeshPhysicalMaterial({ color: 0x4aa8ff, roughness: 0.18, metalness: 0.28, clearcoat: 0.55, transparent: true, opacity: 0.76 }),
            new THREE.MeshPhysicalMaterial({ color: 0xf0c231, roughness: 0.28, metalness: 0.45, clearcoat: 0.3, transparent: true, opacity: 0.72 })
        ];

        for (let i = 0; i < count; i += 1) {
            const sphere = new THREE.Mesh(
                sphereGeometry,
                materials[Math.floor(Math.random() * materials.length)]
            );

            sphere.position.set(0, 0, 0);

            const scale = Math.random() * (isMobile ? 0.45 : 0.55) + (isMobile ? 0.24 : 0.28);
            sphere.scale.set(scale, scale, scale);
            sphere.userData.floatSeed = Math.random() * Math.PI * 2;
            sphere.userData.spinSeed = Math.random() * Math.PI * 2;
            sphere.userData.normX = Math.random() * 2 - 1;
            sphere.userData.normY = Math.random() * 2 - 1;
            sphere.userData.depth = (Math.random() - 0.5) * 16;
            sphere.userData.vx = 0;
            sphere.userData.vy = 0;
            sphere.userData.vz = 0;
            group.add(sphere);
        }

        function getWorldBounds() {
            const halfHeight = Math.tan(THREE.MathUtils.degToRad(camera.fov * 0.5)) * camera.position.z;
            const halfWidth = halfHeight * camera.aspect;
            return { halfWidth, halfHeight };
        }

        function mapSpheresToBounds() {
            const bounds = getWorldBounds();
            const marginX = isMobile ? 0.9 : 1.2;
            const marginY = isMobile ? 0.45 : 0.6;
            const spanX = Math.max(2, bounds.halfWidth - marginX);
            const spanY = Math.max(1.2, bounds.halfHeight - marginY);

            group.children.forEach((sphere) => {
                sphere.userData.baseX = sphere.userData.normX * spanX;
                sphere.userData.baseY = sphere.userData.normY * spanY;
            });
        }

        function resize() {
            const width = container.clientWidth;
            const height = container.clientHeight;
            if (!width || !height) return;
            renderer.setSize(width, height, false);
            camera.aspect = width / height;
            camera.updateProjectionMatrix();
            mapSpheresToBounds();
        }

        resize();
        window.addEventListener('resize', resize);
        if (typeof ResizeObserver !== 'undefined') {
            const ro = new ResizeObserver(resize);
            ro.observe(container);
        }

        if (prefersReducedMotion) {
            renderer.render(scene, camera);
            return;
        }

        let tx = 0;
        let ty = 0;
        let cx = 0;
        let cy = 0;
        let intensity = 1;

        function setPointer(clientX, clientY, boost) {
            const rect = container.getBoundingClientRect();
            if (!rect.width || !rect.height) return;
            const nx = ((clientX - rect.left) / rect.width) * 2 - 1;
            const ny = ((clientY - rect.top) / rect.height) * 2 - 1;
            tx = Math.max(-1, Math.min(1, nx));
            ty = Math.max(-1, Math.min(1, ny));
            intensity = Math.max(intensity, boost);
        }

        container.addEventListener('mousemove', (e) => setPointer(e.clientX, e.clientY, 1.35));
        container.addEventListener('mouseleave', () => { tx = 0; ty = 0; });
        container.addEventListener('touchstart', (e) => {
            const t = e.changedTouches && e.changedTouches[0];
            if (t) setPointer(t.clientX, t.clientY, 1.75);
        }, { passive: true });
        container.addEventListener('touchmove', (e) => {
            const t = e.changedTouches && e.changedTouches[0];
            if (t) setPointer(t.clientX, t.clientY, 1.95);
        }, { passive: true });
        container.addEventListener('touchend', () => { tx *= 0.2; ty *= 0.2; }, { passive: true });

        const clock = new THREE.Clock();
        let lastTime = 0;
        function animate() {
            requestAnimationFrame(animate);
            const t = clock.getElapsedTime();
            lastTime = t;

            cx += (tx - cx) * 0.065;
            cy += (ty - cy) * 0.065;
            intensity += (1 - intensity) * 0.04;

            const bounds = getWorldBounds();
            const pointerWorldX = cx * (bounds.halfWidth * 0.62);
            const pointerWorldY = -cy * (bounds.halfHeight * 0.58);

            group.children.forEach((node, idx) => {
                if (!node.isMesh) return;

                const driftX = Math.sin(t * 0.45 + node.userData.floatSeed + idx * 0.03) * 0.34;
                const driftY = Math.cos(t * 0.52 + node.userData.floatSeed + idx * 0.04) * 0.26;
                const driftZ = Math.sin(t * 0.62 + node.userData.spinSeed + idx * 0.05) * 0.38;

                const targetX = node.userData.baseX + driftX;
                const targetY = node.userData.baseY + driftY;
                const targetZ = node.userData.depth + driftZ;

                let ax = (targetX - node.position.x) * 0.03;
                let ay = (targetY - node.position.y) * 0.03;
                let az = (targetZ - node.position.z) * 0.03;

                const dx = node.position.x - pointerWorldX;
                const dy = node.position.y - pointerWorldY;
                const distSq = dx * dx + dy * dy;
                if (distSq < 7.8) {
                    const repel = (7.8 - distSq) * 0.0012 * intensity;
                    ax += dx * repel;
                    ay += dy * repel;
                }

                node.userData.vx = (node.userData.vx + ax) * 0.86;
                node.userData.vy = (node.userData.vy + ay) * 0.86;
                node.userData.vz = (node.userData.vz + az) * 0.86;

                node.position.x += node.userData.vx;
                node.position.y += node.userData.vy;
                node.position.z += node.userData.vz;

                node.rotation.x += 0.0032 * intensity;
                node.rotation.y += 0.0048 * intensity;
            });

            renderer.render(scene, camera);
        }

        animate();
    }

    initStatsBallCanvas('statsWebglBg');
});
