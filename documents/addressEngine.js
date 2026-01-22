/* ======================================================
   Address Engine (SAFE PATCH)
   Compatible with: ADDRESS_BD (UNCHANGED DATABASE)
====================================================== */

(function () {
  if (typeof ADDRESS_BD === "undefined") {
    console.error("ADDRESS_BD not found. Check addressDatabase.js");
    return;
  }

  const $ = (id) => document.getElementById(id);

  function clearOptions(select, placeholder) {
    select.innerHTML = "";
    const opt = document.createElement("option");
    opt.value = "";
    opt.textContent = placeholder;
    select.appendChild(opt);
  }

  function populate(select, items) {
    items.forEach(item => {
      const opt = document.createElement("option");
      opt.value = item.en;
      opt.textContent = `${item.bn} (${item.en})`;
      select.appendChild(opt);
    });
  }

  /* ---------- DOM ELEMENTS ---------- */
  const upazilaEl = $("upazila");
  const unionEl   = $("union");
  const wardEl    = $("ward");
  const villageEl = $("village");

  if (!upazilaEl || !unionEl || !wardEl || !villageEl) {
    console.warn("Address dropdown fields not found in DOM");
    return;
  }

  /* ---------- INIT ---------- */
  clearOptions(upazilaEl, "উপজেলা নির্বাচন করুন");
  clearOptions(unionEl, "ইউনিয়ন নির্বাচন করুন");
  clearOptions(wardEl, "ওয়ার্ড নির্বাচন করুন");
  clearOptions(villageEl, "গ্রাম নির্বাচন করুন");

  populate(
    upazilaEl,
    Object.keys(ADDRESS_BD.upazilas || {}).map(en => ({
      en,
      bn: ADDRESS_BD.upazilas[en].bn || en
    }))
  );

  /* ---------- EVENTS ---------- */

  upazilaEl.addEventListener("change", () => {
    clearOptions(unionEl, "ইউনিয়ন নির্বাচন করুন");
    clearOptions(wardEl, "ওয়ার্ড নির্বাচন করুন");
    clearOptions(villageEl, "গ্রাম নির্বাচন করুন");

    const up = ADDRESS_BD.upazilas[upazilaEl.value];
    if (!up) return;

    populate(
      unionEl,
      Object.keys(up.unions || {}).map(en => ({
        en,
        bn: up.unions[en].bn || en
      }))
    );
  });

  unionEl.addEventListener("change", () => {
    clearOptions(wardEl, "ওয়ার্ড নির্বাচন করুন");
    clearOptions(villageEl, "গ্রাম নির্বাচন করুন");

    const up = ADDRESS_BD.upazilas[upazilaEl.value];
    const un = up?.unions?.[unionEl.value];
    if (!un) return;

    populate(
      wardEl,
      Object.keys(un.wards || {}).map(en => ({
        en,
        bn: un.wards[en].bn || en
      }))
    );
  });

  wardEl.addEventListener("change", () => {
    clearOptions(villageEl, "গ্রাম নির্বাচন করুন");

    const up = ADDRESS_BD.upazilas[upazilaEl.value];
    const un = up?.unions?.[unionEl.value];
    const wd = un?.wards?.[wardEl.value];
    if (!wd) return;

    populate(villageEl, wd.villages || []);
  });

})();
