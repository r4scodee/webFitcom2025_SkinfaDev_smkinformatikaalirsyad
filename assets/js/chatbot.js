const messagesContainer = document.getElementById("chat-messages"),
    inputField = document.getElementById("input-field"),
    sendButton = document.getElementById("send-btn"),
    chatbot = document.getElementById("chatbot"),
    chatToggle = document.getElementById("chat-toggle"),
    faqData = [{ keywords: ["bagaimana cara melihat laporan", "lihat laporan", "laporan", "report", "cetak laporan", "\uD83D\uDCCA Bagaimana cara melihat laporan"], response: "Untuk melihat laporan, buka menu *Report* di sidebar, Lalu Anda bisa klik Generate Report." }, { keywords: ["bagaimana tambah data baru", "tambah data", "input data", "buat data baru", "add data"], response: "Untuk menambah data baru, masuk ke menu *Products*, lalu klik tombol *Tambah Data* di pojok kanan atas." }, { keywords: ["bagaimana cara edit data", "edit data", "ubah data", "update data"], response: "Untuk mengedit data, masuk ke menu *Products* Lalu klik tombol *Edit ✏️* pada tabel. Setelah itu simpan perubahan." }, { keywords: ["bagaimana hapus data", "hapus data", "delete data", "remove data"], response: "Untuk menghapus data, masuk ke menu *Products* klik tombol *Hapus \uD83D\uDDD1️* di baris data yang dipilih. Sistem akan minta konfirmasi sebelum data benar-benar dihapus." }, { keywords: ["bagaimana cara melihat chart", "lihat chart", "chart", "grafik", "statistik"], response: "Untuk melihat chart, masuk ke menu *Dashboard*. Lalu Anda bisa melihat grafik penjualan." }, { keywords: ["bagaimana cara membuat produk", "buat produk", "tambah produk", "input produk"], response: "Untuk membuat produk, buka menu *Produk*, lalu klik tombol *Tambah Produk*, isi form yang tersedia, dan simpan." }, { keywords: ["logout", "log out", "keluar", "sign out", "bagaimana cara logout"], response: "Untuk logout, klik foto profil Anda di pojok kanan atas, lalu pilih opsi *Logout*." }, { keywords: ["halo", "hai", "hello", "permisi", "assalamualaikum", "hi"], response: "Halo admin \uD83D\uDC4B Ada yang bisa saya bantu terkait dashboard ini?" }, { keywords: ["mau tanya", "ingin tanya", "boleh tanya", "nanya", "tanya", "bertanya"], response: "Silakan, tanyakan apa yang Anda butuhkan terkait penggunaan dashboard. \uD83D\uDE0A" }, { keywords: ["terima kasih", "thanks", "makasih"], response: "Sama-sama! Semoga membantu ya \uD83D\uDE4F" }, { keywords: ["siapa kamu", "kamu siapa", "bot apa ini", "siapa"], response: "Saya adalah chatbot Admin Assistant \uD83E\uDD16 yang siap membantu Anda menggunakan dashboard dengan mudah. -Tani Digital" }];

function addMessage(a, e) {
    let t = document.createElement("div");
    t.classList.add("message"), "user" === e && t.classList.add("parker"), t.textContent = a, messagesContainer.appendChild(t), messagesContainer.scrollTop = messagesContainer.scrollHeight
}

function getResponse(a) {
    if (a = a.trim(), /^[\p{Emoji}\s]+$/u.test(a)) return `${a} Mantap emotenya! Ada pertanyaan seputar  penggunaan dashboard admin yang bisa saya bantu?`;
    let e = a.toLowerCase();
    for (let t of faqData)
        for (let n of t.keywords)
            if (e.includes(n.toLowerCase())) return t.response;
    return "Maaf, saya tidak mengerti pertanyaan Anda. Silakan bertanya seputar penggunaan dashboard admin."
}
sendButton.addEventListener("click", () => {
    let a = inputField.value.trim();
    if ("" === a) return;
    addMessage(a, "user"), inputField.value = "";
    let e = getResponse(a);
    setTimeout(() => { addMessage(e, "bot") }, 600)
}), inputField.addEventListener("keypress", a => { "Enter" === a.key && sendButton.click() }), chatToggle.addEventListener("click", () => {
    let a = "none" === chatbot.style.display || "" === chatbot.style.display;
    chatbot.style.display = a ? "block" : "none", a && (messagesContainer.scrollTop = messagesContainer.scrollHeight, inputField.focus({ preventScroll: !0 }))
}), window.addEventListener("load", () => { messagesContainer.scrollTop = messagesContainer.scrollHeight });
const micButton = document.querySelector(".fa-microphone");
micButton.addEventListener("click", () => {
    if (!("webkitSpeechRecognition" in window)) { alert("Speech Recognition tidak didukung di browser ini"); return }
    let a = new webkitSpeechRecognition;
    a.lang = "id-ID", a.continuous = !1, a.interimResults = !1, a.start(), micButton.style.color = "red", a.onresult = a => {
        let e = a.results[0][0].transcript;
        inputField.value += e
    }, a.onerror = a => { console.error("Speech recognition error:", a.error) }, a.onend = () => { micButton.style.color = "#666" }
});
const emojiButton = document.querySelector(".fa-laugh-beam"),
    inputContainer = document.querySelector(".input"),
    picker = document.querySelector("emoji-picker");

function updateLocalWIBTime() {
    let a = new Date,
        e = a.getTime() + 6e4 * a.getTimezoneOffset(),
        t = new Date(e + 252e5),
        n = String(t.getHours()).padStart(2, "0"),
        s = String(t.getMinutes()).padStart(2, "0"),
        i = document.getElementById("time-display");
    i.textContent = `Sekarang Jam ${n}:${s} WIB`
}
emojiButton.addEventListener("click", a => { a.stopPropagation(), picker.style.display = "block" === picker.style.display ? "none" : "block" }), picker.addEventListener("emoji-click", a => { inputField.value += a.detail.unicode, inputField.focus() }), document.addEventListener("click", a => { inputContainer.contains(a.target) || (picker.style.display = "none") }), window.addEventListener("DOMContentLoaded", () => { updateLocalWIBTime(), setInterval(updateLocalWIBTime, 6e4) });
const chipsContainer = document.getElementById("suggested-chips");
let isDown = !1,
    startX, scrollLeft, isDragging = !1;

function getX(a) { return a.touches && a.touches.length ? a.touches[0].pageX : a.pageX }

function startDrag(a) { isDown = !0, isDragging = !1, startX = a.type.includes("touch") ? a.touches[0].pageX : a.pageX, scrollLeft = chipsContainer.scrollLeft, chipsContainer.style.cursor = "grabbing" }

function endDrag(a) {
    if (chipsContainer.style.cursor = "grab", !isDragging && !a.type.includes("touch")) {
        let e = a.target.closest(".chip");
        e && (inputField.value = e.textContent, sendButton.click())
    }
    isDown = !1
}

function moveDrag(a) {
    if (!isDown) return;
    a.preventDefault();
    let e = a.type.includes("touch") ? a.touches[0].pageX : a.pageX,
        t = (e - startX) * 1.5;
    Math.abs(t) > 5 && (isDragging = !0), chipsContainer.scrollLeft = scrollLeft - t
}

function getResponse(a) {
    if (a = a.trim(), /^[\p{Emoji}\s]+$/u.test(a)) return `${a} Mantap emotenya! Ada pertanyaan seputar  penggunaan dashboard admin yang bisa saya bantu?`;
    let e = a.toLowerCase();
    for (let t of faqData)
        for (let n of t.keywords)
            if (e.includes(n.toLowerCase())) return t.response;
    return "Maaf, saya tidak mengerti pertanyaan Anda. Silakan bertanya seputar penggunaan dashboard admin."
}
chipsContainer.addEventListener("mousedown", startDrag), chipsContainer.addEventListener("mouseup", endDrag), chipsContainer.addEventListener("mouseleave", endDrag), chipsContainer.addEventListener("mousemove", moveDrag), chipsContainer.addEventListener("touchstart", startDrag, { passive: !1 }), chipsContainer.addEventListener("touchend", endDrag), chipsContainer.addEventListener("touchmove", moveDrag, { passive: !1 });