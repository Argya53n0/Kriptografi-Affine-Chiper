<?php require_once 'process_text.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affine Cipher PHP + Docker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8 flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-3xl">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Affine Cipher (Kelompok X)</h1>
        
        <?php if ($alertMsg): ?>
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($alertMsg) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-5">
                <label class="block font-semibold mb-2">Input Teks:</label>
                <textarea name="inputText" rows="4" class="w-full border p-3 rounded focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($_POST['inputText'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-2 gap-6 mb-5">
                <div>
                    <label class="block font-semibold mb-2">Kunci a (Multiplier):</label>
                    <input type="number" name="keyA" value="<?= htmlspecialchars($_POST['keyA'] ?? '5') ?>" class="w-full border p-3 rounded focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block font-semibold mb-2">Kunci b (Shift):</label>
                    <input type="number" name="keyB" value="<?= htmlspecialchars($_POST['keyB'] ?? '8') ?>" class="w-full border p-3 rounded focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="mb-6">
                <label class="block font-semibold mb-2">Format Output (Enkripsi):</label>
                <select name="formatOutput" class="w-full border p-3 rounded">
                    <option value="normal" <?= (isset($_POST['formatOutput']) && $_POST['formatOutput'] == 'normal') ? 'selected' : '' ?>>Normal (Dengan Spasi)</option>
                    <option value="nospace" <?= (isset($_POST['formatOutput']) && $_POST['formatOutput'] == 'nospace') ? 'selected' : '' ?>>Tanpa Spasi</option>
                    <option value="group5" <?= (isset($_POST['formatOutput']) && $_POST['formatOutput'] == 'group5') ? 'selected' : '' ?>>Kelompok 5-Huruf</option>
                </select>
            </div>

            <div class="flex gap-4 mb-8">
                <button type="submit" name="action" value="encrypt" class="bg-blue-600 text-white px-4 py-3 rounded flex-1">Enkripsi Teks</button>
                <button type="submit" name="action" value="decrypt" class="bg-green-600 text-white px-4 py-3 rounded flex-1">Dekripsi Teks</button>
            </div>
        </form>

        <div class="mb-8">
            <label class="block font-semibold mb-2">Output Teks:</label>
            <textarea rows="4" class="w-full border p-3 rounded bg-gray-50" readonly><?= htmlspecialchars($resultText) ?></textarea>
        </div>
    </div>
</body>
</html>