<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Commission Tabs</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --primary: #37517E;
      --secondary: #47B2E4;
      --dark: #1F3E72;
      --light: #F3F5FA;
    }

    body {
      background-color: var(--light);
      font-family: sans-serif;
      color: var(--dark);
    }

    .tab-button {
      padding: 0.5rem 1rem;
      border: 2px solid var(--primary);
      border-radius: 0.375rem;
      background-color: white;
      color: var(--primary);
      cursor: pointer;
      transition: all 0.2s;
    }

    .tab-button.active {
      background-color: var(--primary);
      color: white;
    }

    .tab-pane {
      display: none;
    }

    .tab-pane.active {
      display: block;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 0.75rem;
      text-align: left;
    }

    thead {
      background-color: var(--light);
    }

    @media (max-width: 640px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      tr {
        margin-bottom: 1rem;
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 0 5px rgba(0,0,0,0.05);
      }

      td {
        padding-left: 50%;
        position: relative;
        text-align: right;
      }

      td::before {
        content: attr(data-label);
        position: absolute;
        left: 1rem;
        top: 0.75rem;
        font-weight: bold;
        text-align: left;
        color: var(--dark);
      }
    }
  </style>
</head>
<body>

  <section class="max-w-5xl mx-auto p-6">
    <div class="flex flex-wrap gap-3 justify-center mb-6">
      <button class="tab-button active" data-tab="1">Equity</button>
      <button class="tab-button" data-tab="2">Government Bond</button>
      <button class="tab-button" data-tab="3">Corporate Bond and Debenture</button>
      <button class="tab-button" data-tab="4">Close-End Bond</button>
    </div>

    <div class="tab-content">
      <div class="tab-pane active" data-content="1">
        <table>
          <thead>
            <tr>
              <th class="bg-[#37517E] font-bold text-white">Transaction Amount</th>
              <th class="bg-[#37517E] font-bold text-white">Brokerage Fee*</th>
            </tr>
          </thead>
          <tbody>
            <tr><td data-label="Transaction Amount">Rs 50,000 or Less</td><td data-label="Brokerage Fee*">0.36%</td></tr>
            <tr><td data-label="Transaction Amount">Rs 50,001 to Rs 5,00,000</td><td data-label="Brokerage Fee*">0.33%</td></tr>
            <tr><td data-label="Transaction Amount">Rs 5,00,001 to Rs 20,00,000</td><td data-label="Brokerage Fee*">0.31%</td></tr>
            <tr><td data-label="Transaction Amount">Rs 20,00,001 to Rs 1,00,00,000</td><td data-label="Brokerage Fee*">0.27%</td></tr>
            <tr><td data-label="Transaction Amount">Above Rs 1,00,00,000</td><td data-label="Brokerage Fee*">0.24%</td></tr>
          </tbody>
        </table>
        <p class="mt-2 text-sm">*additional of 0.015% SEBON transaction fee and Rs 25 DP charges is applicable</p>
      </div>

      <div class="tab-pane" data-content="2">
        <table>
          <thead>
            <tr>
              <th class="bg-[#37517E] font-bold text-white">Transaction Amount</th>
              <th class="bg-[#37517E] font-bold text-white">Brokerage Fee*</th>
            </tr>
          </thead>
          <tbody>
            <tr><td data-label="Transaction Amount">Up to Rs. 5,00,000</td><td data-label="Brokerage Fee*">Flat Rs 10 or 0.10%</td></tr>
            <tr><td data-label="Transaction Amount">Rs 50,001 to Rs 5,00,000</td><td data-label="Brokerage Fee*">0.05%</td></tr>
            <tr><td data-label="Transaction Amount">Rs 5,00,001 to Rs 20,00,000</td><td data-label="Brokerage Fee*">0.02%</td></tr>
          </tbody>
        </table>
        <p class="mt-2 text-sm">*additional of 0.005% SEBON transaction fee and Rs 25 DP charges is applicable</p>
      </div>

      <div class="tab-pane" data-content="3">
        <table>
          <thead>
          <tr>
              <th class="bg-[#37517E] font-bold text-white">Transaction Amount</th>
              <th class="bg-[#37517E] font-bold text-white">Brokerage Fee*</th>
            </tr>
          </thead>
          <tbody>
            <tr><td data-label="Transaction Amount">Up to Rs. 5,00,000</td><td data-label="Brokerage Fee*">Flat Rs 10 or 0.10%</td></tr>
            <tr><td data-label="Transaction Amount">Rs 50,001 to Rs 5,00,000</td><td data-label="Brokerage Fee*">0.05%</td></tr>
            <tr><td data-label="Transaction Amount">Above Rs. 50,00,000</td><td data-label="Brokerage Fee*">0.02%</td></tr>
          </tbody>
        </table>
        <p class="mt-2 text-sm">*additional of 0.010% SEBON transaction fee and Rs 25 DP charges is applicable</p>
      </div>

      <div class="tab-pane" data-content="4">
        <table>
          <thead>
            <tr>
              <th class="bg-[#37517E] font-bold text-white">Transaction Amount</th>
              <th class="bg-[#37517E] font-bold text-white">Brokerage Fee*</th>
            </tr>
          </thead>
          <tbody>
            <tr><td data-label="Transaction Amount">Up to Rs. 5,00,000</td><td data-label="Brokerage Fee*">Flat Rs 10 or 0.15%</td></tr>
            <tr><td data-label="Transaction Amount">Rs. 5,00,001 to Rs. 50,00,000</td><td data-label="Brokerage Fee*">0.12%</td></tr>
            <tr><td data-label="Transaction Amount">Above Rs. 50,00,000</td><td data-label="Brokerage Fee*">0.10%</td></tr>
          </tbody>
        </table>
        <p class="mt-2 text-sm">*additional of 0.010% SEBON transaction fee and Rs 25 DP charges is applicable</p>
      </div>
    </div>
  </section>

  <script>
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabPanes = document.querySelectorAll('.tab-pane');

    tabButtons.forEach(button => {
      button.addEventListener('click', () => {
        const target = button.getAttribute('data-tab');

        tabButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        tabPanes.forEach(pane => {
          if (pane.getAttribute('data-content') === target) {
            pane.classList.add('active');
          } else {
            pane.classList.remove('active');
          }
        });
      });
    });
  </script>

</body>
</html>
