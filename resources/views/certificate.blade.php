<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Certificate of Completion - Phoneo</title>
  <style>


    body {
      margin: 0;
      padding: 40px;
      background: linear-gradient(135deg, #ecf0f3, #e0eafc);
      font-family: 'Roboto', sans-serif;
    }

    .certificate-box {
      max-width: 950px;
      margin: auto;
      padding: 60px;
      background: #fff;
      border: 12px solid #00d8db;
      border-radius: 18px;
      box-shadow: 0 20px 60px rgba(0, 102, 204, 0.2);
      text-align: center;
      position: relative;
    }

    .logo {
      width: 150px;
      margin-bottom: 20px;
    }

    h1 {
      font-family: 'Playfair Display', serif;
      font-size: 46px;
      color: #003366;
      margin-bottom: 15px;
    }

    .subtitle {
      font-size: 20px;
      color: #555;
      margin-bottom: 25px;
    }

    .recipient {
      font-size: 30px;
      font-weight: bold;
      margin-bottom: 15px;
      color: #1a1a1a;
    }

    .course {
      font-size: 22px;
      color: #333;
      margin-bottom: 30px;
    }

    .date {
      font-size: 18px;
      color: #666;
      margin-bottom: 50px;
    }

    .signature {
      font-size: 18px;
      text-align: right;
      margin-top: 40px;
      font-style: italic;
      color: #444;
    }

    .seal {
      position: absolute;
      left: 60px;
      bottom: 50px;
      width: 90px;
    }

    .footer-note {
      font-size: 14px;
      color: #888;
      margin-top: 40px;
    }

    .ribbon-background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
    }

    .ribbon-background::before,
    .ribbon-background::after {
      content: "";
      position: absolute;
      z-index: 1;
    }

    .ribbon-background::before {
      top: 0;
      left: 0;
      width: 28%;
      height: 100%;
      background: rgb(240 252 255);
      clip-path: polygon(4% -8%, 35% -142%, -62% 202%, 80% 49%);
    }

    .ribbon-background::after {
      top: 0;
      right: 0;
      width: 25%;
      height: 100%;
      background: rgb(240 252 255);
      clip-path: polygon(100% 0, 0 0, 100% 100%);
    }

    .badge {
      position: absolute;
      top: 50%;
      left: 2%;
      transform: translateY(-50%);
      z-index: 2;
      background: white;
      border: 6px solid rgb(123, 233, 233);
      border-radius: 50%;
      width: 15%;
      height: 21%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-align: center;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .badge-text {
      font-size: 18px;
      font-weight: bold;
      color: rgb(78, 78, 78);
    }

    .badge::after {
      content: "";
      position: absolute;
      bottom: -30px;
      width: 0;
      height: 0;
      border-left: 25px solid transparent;
      border-right: 25px solid transparent;
      border-top: 30px solid rgb(123, 233, 233);
    }

    hr {
      border-color: aqua;
      width: 182px;
      margin-top: 5px;
    }
    footer{
    text-align: center;
    margin-top: 37px;
}
  </style>
</head>
<body>

  <div class="certificate-box">
    <div class="ribbon-background"></div>

    <img src="{{ asset('images/image.webp') }}" alt="Phoneo Logo" class="logo">

    <h1>Certificate of Completion</h1>
    <div class="subtitle">This certificate is proudly awarded to</div>

    <div class="recipient">{{ session('username') }}<hr></div>

    <div class="course">
      for successfully completing the course<br>
      <strong>{{ ucfirst(session('subject')) }} - New Joinee</strong>
    </div>

    <div class="date" id="today-date"></div>

    <div class="signature">Authorized Signature</div>

    <div class="footer-note">
      Powered by <strong>Phoneo</strong> | www.phoneo.in
    </div>
  </div>
  <div style="text-align: center; margin-top: 30px;">
  <button onclick="downloadCertificate()" style="padding: 12px 24px; background-color: #00d8db; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer;">
    Download Certificate
  </button>
</div>
<script>
  function downloadCertificate() {
    const element = document.querySelector(".certificate-box");

    const opt = {
      margin:       0.2,
      filename:     'Certificate-{{ session("username") }}.pdf',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { scale: 2 },
      jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
    };

    html2pdf().from(element).set(opt).save();
  }
</script>

  <script>
    const dateElement = document.getElementById("today-date");
    const today = new Date();
    const formattedDate = today.toLocaleDateString('en-GB', {
      day: '2-digit', month: 'long', year: 'numeric'
    });
    dateElement.textContent = formattedDate;
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<footer>
    <hr>
    <div class="footer-note">
      Powered by <strong>Phoneo</strong> | www.phoneo.in
    </div>
    </footer>
</body>
</html>
