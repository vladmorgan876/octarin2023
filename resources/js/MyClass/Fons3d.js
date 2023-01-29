

function fon3d(){
    const shader = {
        vertex: `void main() {
        gl_Position = vec4( position, 1.0 );
        }`,
        fragment: `precision highp float;
        uniform vec2 resolution;
        uniform float time;
        uniform vec2 mouse;
        uniform sampler2D backbuffer;
        vec3 wave(vec2 uv,float speed, float thickness, float amplitude, float delay, vec3 color){
        float shake = mix(0.0, 1.0, amplitude);
        float wave = sin(delay + mod(uv.x+uv.y/2.0,0.25) * 1.0 - time * speed ) / 5.0 * shake;
        float colwave = thickness /  abs((1.0-length(uv))+wave);
        return color * colwave;
        }
        float random (in vec2 st) {
        return fract(cos(dot(st.xy,
        vec2(12.9898,78.233)))
        * 43758.5453123);
        }
        void main(void) {
        vec2 uv = (gl_FragCoord.xy * 2.0 - resolution.xy) / min(resolution.x, resolution.y);
        vec3 col0 = wave(uv,0.1,0.08,8.0,5., vec3(0.6, 0.6, 0.6));
        vec3 col1 = wave(uv,0.2,0.08,9.0,6., vec3(0.4, 0.9, 0.9));
        vec3 col2 = wave(uv,0.2,0.08,10.0,7., vec3(0.6, 0.9, 0.9));
        vec3 col3 = wave(uv,0.1,0.08,11.0,8., vec3(0.6, 0.6, 0.6));
        vec3 col = col0+col1+col2+col3;
        gl_FragColor = vec4(vec3(col), 1.0);
        }`
    };
    var container;
    var camera, scene, renderer;
    var uniforms;
    init();
    animate();
    function init() {
        container = document.getElementById('bg-3');
        camera = new THREE.Camera();
        camera.position.z = 1;
        scene = new THREE.Scene();
        var geometry = new THREE.PlaneBufferGeometry( 2, 2 );
        uniforms = {
            time: { type: "f", value: 1.0 },
            resolution: { type: "v2", value: new THREE.Vector2() }
        };
        var material = new THREE.ShaderMaterial( {
            uniforms: uniforms,
            vertexShader: shader.vertex,
            fragmentShader: shader.fragment
        } );
        var mesh = new THREE.Mesh( geometry, material );
        scene.add( mesh );
        renderer = new THREE.WebGLRenderer();
        renderer.setPixelRatio( window.devicePixelRatio );
        container.appendChild( renderer.domElement );
        onWindowResize();
        window.addEventListener( 'resize', onWindowResize, false );
    }
    function onWindowResize( event ) {
        renderer.setSize( container.offsetWidth, container.offsetHeight );
        uniforms.resolution.value.x = renderer.domElement.width;
        uniforms.resolution.value.y = renderer.domElement.height;
    }
    function animate() {
        requestAnimationFrame( animate );
        render();
    }
    function render() {
        uniforms.time.value += 0.05;
        renderer.render( scene, camera );
    }
}
export {fon3d};
function earth3d(){

    const vShader = `
varying vec2 v_uv;

void main() {
  v_uv = uv;
  gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);

}
`
    const fShader = `
varying vec2 v_uv;
uniform vec2 u_resolution;
uniform vec3 u_color;
uniform float u_time;
float random (in vec2 st) {
    return fract(sin(dot(st.xy,
                         vec2(12.9898,78.233)))*
        43758.5453123);
}
float noise (in vec2 st) {
    vec2 i = floor(st);
    vec2 f = fract(st);

    // Four corners in 2D of a tile
    float a = random(i);
    float b = random(i + vec2(1.0, 0.0));
    float c = random(i + vec2(0.0, 1.0));
    float d = random(i + vec2(1.0, 1.0));

    vec2 u = f * f * (3.0 - 2.0 * f);

    return mix(a, b, u.x) +
            (c - a)* u.y * (1.0 - u.x) +
            (d - b) * u.x * u.y;
}

#define OCTAVES 6
float fbm (in vec2 st) {
    // Initial values
    float value = 0.0;
    float amplitude = .5;
    float frequency = 0.;
    //
    // Loop of octaves
    for (int i = 0; i < OCTAVES; i++) {
        value += amplitude * noise(st);
        st *= 2.;
        amplitude *= .7;
    }
    return value;
}

void main() {

  //vec2 uv = gl_FragCoord.xy / u_resolution;
  //gl_FragColor = vec4(1.0, 0.0, sin(u_time * 10.0) + 0.5, 1.0).rgba;


  const float speed=100.;
  const float details=0.05;
  const float force=0.4;
  const float shift=0.4;
  const float scaleFactor=1.5;
  vec2 xyFast=details*vec2(gl_FragCoord.x,gl_FragCoord.y-u_time*speed);
  float noise1=fbm(xyFast);
  float noise2=force*(fbm(xyFast+noise1+u_time)-shift);

  const vec3 red=vec3(0.9,0.4,0.2);
  const vec3 yellow=vec3(0.9,0.9,0.0);
  const vec3 darkred=vec3(0.5,0.0,0.0);
  const vec3 dark=vec3(0.1,0.1,0.1);
  vec3 c1=mix(red,darkred,noise1+shift);
  vec3 c2=mix(yellow,dark,noise2);


  vec3 gradient=vec3(scaleFactor*gl_FragCoord.y/u_resolution.y);
  vec3 fire=c1+c2*1.3-gradient-noise2;
  gl_FragColor = vec4(vec3(fire), 1.0).rgba;

}
`
    const uniforms = {
        u_resolution: { value: { x: window.innerWidth, y: window.innerHeight } },
        u_time: { value: 100.0 },
        u_color: { value: new THREE.Color(0xFF0000) }
    };
    const clock = new THREE.Clock();

    let width=window.innerWidth;
    let height=window.innerHeight;
    var scene = new THREE.Scene();

    var spotLight = new THREE.SpotLight(0xeeeece,2);
    spotLight.position.set(400, 0, 400);

    scene.add(spotLight);

    var camera = new THREE.PerspectiveCamera( 45,width /height, 0.1, 1000 );
    camera.position.z = 3;

    let canvas=document.getElementById("canvas");
    canvas.setAttribute("width",width);
    canvas.setAttribute("height",height);

    let renderer=new THREE.WebGLRenderer({canvas:canvas,alpha:true});
    renderer.setClearColor(0x000000,0);
//   --------- earth   -------------
    var geometry = new THREE.SphereGeometry(.5, 32, 32);
    const loaderImage = new THREE.TextureLoader();
    var material = new THREE.MeshPhongMaterial({wireframe:false, map: loaderImage.load('/storage/newimage/newearth.jpg')});

    var earth = new THREE.Mesh( geometry, material );
    earth.position.set(-0,-0.1,-10)
    scene.add( earth );
    //---------------------  atmosphere  ------------------------
    var geometryCloud = new THREE.SphereGeometry(.52, 32, 32);
    const loaderCloud = new THREE.TextureLoader();
    var materialCloud = new THREE.MeshPhongMaterial({wireframe:false, map: loaderCloud.load('/storage/newimage/cloud2.jpg'),opacity:.3, transparent: true});
    var Cloud = new THREE.Mesh( geometryCloud, materialCloud );
    Cloud.position.set(-0,-0,-0)
    earth.add(Cloud)
    //   --------- moon   -------------
    var geometryMoon = new THREE.SphereGeometry(.5, 32, 32);
    const loaderImageMoon = new THREE.TextureLoader();
    var materialMoon = new THREE.MeshPhongMaterial({wireframe:false, map: loaderImageMoon.load('/storage/newimage/moon.jpg')});

    var moon = new THREE.Mesh( geometryMoon, materialMoon );
    moon.scale.set(.2,.2,.2);
    moon.position.set(0,0,1.25);
    moon.name='moon'
    earth.add(moon);
//  ----------------------- TEXT  ---------------------------------------
    const loader = new THREE.FontLoader();
    function loadFont(url) {
        return new Promise((resolve, reject) => {
            loader.load(url, resolve, undefined, reject);
        });
    }

    async function doit() {
        let font = await loadFont('https://threejsfundamentals.org/threejs/resources/threejs/fonts/helvetiker_regular.typeface.json');
        let text="Octarine_Art";
        let geometryText=new THREE.TextGeometry(text,{
            font:font,
            size:.1,
            height:.02,
        })
        //----------------- shader material -----------------
        function createMaterialText() {
            let materialText = new THREE.ShaderMaterial({
                vertexShader: vShader,
                fragmentShader: fShader,
                uniforms
            });
            return materialText;
        }
        //------------------------------------
        // function createMaterialText() {
        //     let materialText = new THREE.MeshPhongMaterial({
        //     });
        //     let color=0;
        //     let saturation = 1;
        //     let luminance = .5;
        //     materialText.color.setHSL(color, saturation, luminance);
        //     return materialText;
        // }
        let TextMesh=new THREE.Mesh(geometryText,createMaterialText());
        TextMesh.position.set(-0.4,0,.75);
        TextMesh.scale.set(0,0,0);
        earth.add(TextMesh);
    }
    doit();

//   -----------------------------------------------------------------------
    function render() {
        requestAnimationFrame( render );
        uniforms.u_time.value = clock.getElapsedTime();

        if(earth.rotation.y<=6.25){
            earth.rotation.y += 0.01;
        }
        if(earth.position.z<=1){
            earth.position.z += 0.1;
        }
        if(earth.rotation.y>=3){
            moon.scale.set(0,0,0);
            earth.children[2].scale.set(1,1,1);
        }
        if(earth.rotation.y>=6.24){
            setTimeout(function (){
                if( earth.children[2].position.z<=1.8){
                    earth.children[2].position.z +=0.007
                }
            },1000)

        }


        renderer.render( scene, camera );
    }
    render();
}
export {earth3d};
