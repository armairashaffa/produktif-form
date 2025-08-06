<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kasir Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9f7ef;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Pembayaran Kasir</h1>
        
        <?php
        // Inisialisasi variabel
        $items = array();
        $total = 0;
        $pay = 0;
        $change = 0;
        
        // Proses form saat submit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil data dari form
            $item_name = $_POST['item_name'] ?? '';
            $item_price = $_POST['item_price'] ?? 0;
            $item_qty = $_POST['item_qty'] ?? 0;
            $pay = $_POST['pay'] ?? 0;
            
            // Tambahkan item jika ada input
            if (!empty($item_name) && $item_price > 0 && $item_qty > 0) {
                $items[] = array(
                    'name' => $item_name,
                    'price' => $item_price,
                    'qty' => $item_qty,
                    'subtotal' => $item_price * $item_qty
                );
            }
            
            // Hitung total jika ada item
            if (!empty($_POST['items'])) {
                $items = json_decode($_POST['items'], true);
            }
            
            $total = array_sum(array_column($items, 'subtotal'));
            
            // Hitung kembalian
            $change = $pay - $total;
        }
        ?>
        
        <form method="post">
            <div class="form-group">
                <label for="item_name">Nama Barang:</label>
                <input type="text" id="item_name" name="item_name" required>
            </div>
            
            <div class="form-group">
                <label for="item_price">Harga:</label>
                <input type="number" id="item_price" name="item_price" min="0" required>
            </div>
            
            <div class="form-group">
                <label for="item_qty">Jumlah:</label>
                <input type="number" id="item_qty" name="item_qty" min="1" required>
            </div>
            
            <button type="submit" name="add_item">Tambah Barang</button>
            
            <?php if (!empty($items)): ?>
                <h3>Daftar Belanja</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                <td>Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></td>
                                <td><?php echo $item['qty']; ?></td>
                                <td>Rp <?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total</th>
                            <th>Rp <?php echo number_format($total, 0, ',', '.'); ?></th>
                        </tr>
                    </tfoot>
                </table>
                
                <div class="form-group">
                    <label for="pay">Jumlah Pembayaran:</label>
                    <input type="number" id="pay" name="pay" min="<?php echo $total; ?>" value="<?php echo $pay; ?>" required>
                </div>
                
                <button type="submit" name="process_payment">Proses Pembayaran</button>
                
                <input type="hidden" name="items" value="<?php echo htmlspecialchars(json_encode($items)); ?>">
                
                <?php if ($pay > 0): ?>
                    <div class="result">
                        <h3>Struk Pembayaran</h3>
                        <p>Total Belanja: Rp <?php echo number_format($total, 0, ',', '.'); ?></p>
                        <p>Dibayar: Rp <?php echo number_format($pay, 0, ',', '.'); ?></p>
                        <p>Kembalian: Rp <?php echo number_format($change, 0, ',', '.'); ?></p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>

