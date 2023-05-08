const USERCODE = document.getElementById('user-code');
new QRious({
  element: document.querySelector("#codigo"),
  value: USERCODE.dataset.code, // La URL o el texto
  size: 400,
  backgroundAlpha: 0, // 0 para fondo transparente
  foreground: "#000", // Color del QR
  level: "H", // Puede ser L,M,Q y H (L es el de menor nivel, H el mayor)
});
