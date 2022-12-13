/**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
function showDownload(result) {
    console.log("Download selesai");
    console.log("Hasil Download: " + result);
}
*/

/**
 * Fungsi untuk download file
 * @param {function} callback - Function callback show
function download(callShowDownload) {
    setTimeout(function () {
        const result = "windows-10.exe";
        callShowDownload(result);
    }, 3000);
}

download(showDownload);
*/

/**
 * TODO:
 * - Refactor callback ke Promise atau Async Await
 * - Refactor function ke ES6 Arrow Function
 * - Refactor string ke ES6 Template Literals
 */

const download = () => {
    return new Promise((resolve, reject) => {
        const status = true;

        setTimeout(() => {
            if (status) {
                resolve("Download sedang berlangsung...");
            } else {
                reject("Download Gagal");
            }
        }, 1000);
    });
};

const showDownload = () => {
    return new Promise((resolve) => {
        setTimeout(() => {
            const result = "Windows-10.iso";
            resolve(`Download selesai\nHasil Download : ${result}`);
        }, 5000);
    });
}

async function main() {
    console.log(await download());
    console.log(await showDownload());
}

main();