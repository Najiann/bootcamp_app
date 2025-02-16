

function calculateBMI() {
  // Değerleri al
  const height = parseFloat(document.getElementById('height').value);
  const weight = parseFloat(document.getElementById('weight').value);
  
  // Değerlerin geçerliliğini kontrol et
  if (!height || !weight || height <= 0 || weight <= 0) {
    alert('Lütfen geçerli boy ve kilo değerleri giriniz!');
    return;
  }
  
  // BMI hesapla
  const heightInMeters = height / 100;
  const bmi = weight / (heightInMeters * heightInMeters);
  const bmiRounded = bmi.toFixed(1);
  
  // Sonucu göster
  document.getElementById('bmiResult').classList.remove('d-none');
  document.getElementById('bmiValue').textContent = bmiRounded;
  
  // Ok pozisyonunu ayarla
  const arrow = document.getElementById('bmiArrow');
  const chartWidth = document.querySelector('.bmi-chart img').offsetWidth;
  
  let position;
  if (bmi < 18.5) {
    position = chartWidth * 0.1; // Underweight
    document.getElementById('bmiCategory').textContent = 'Zayıf';
  } else if (bmi < 25) {
    position = chartWidth * 0.3; // Normal
    document.getElementById('bmiCategory').textContent = 'Normal';
  } else if (bmi < 30) {
    position = chartWidth * 0.5; // Overweight
    document.getElementById('bmiCategory').textContent = 'Fazla Kilolu';
  } else if (bmi < 35) {
    position = chartWidth * 0.7; // Obese
    document.getElementById('bmiCategory').textContent = 'Obez';
  } else {
    position = chartWidth * 0.9; // Extremely Obese
    document.getElementById('bmiCategory').textContent = 'Aşırı Obez';
  }
  
  arrow.style.left = `${position}px`;
}

// Scroll event listener
window.addEventListener('scroll', function() {
    const header = document.querySelector('#header');
    const heroSection = document.querySelector('#hero');
    
    // Hero section'ın bittiği nokta
    const heroBottom = heroSection.offsetTop + heroSection.offsetHeight;
    
    // Scroll pozisyonu hero'yu geçtiyse
    if (window.scrollY > heroBottom - 100) { // 100px önce başlasın
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});
