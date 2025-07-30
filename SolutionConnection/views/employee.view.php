<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<body class="bg-gray-100 p-6">
<div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Employee Search</h2>
    
    <form method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <input name="id" placeholder="Employee ID" class="p-2 border rounded">
        <div class="col-span-2">
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Search</button>
        </div>
    </form>

    <?php if ($employees): ?>
        <table class="w-full border border-collapse">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Hire Date</th>
                    <th class="border p-2">Nationality</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $emp): ?>
                    <tr class="hover:bg-gray-100">
                        <td class="border p-2"><?= $emp['Id'] ?></td>
                        <td class="border p-2"><?= $emp['EmployeeName'] ?></td>
                        <td class="border p-2"><?= date_format($emp['HireDate'], 'Y-m-d') ?></td>
                        <td class="border p-2"><?= $emp['NameEnglish'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif ($_GET): ?>
        <p class="text-red-600">No results found.</p>
    <?php endif; ?>
</div>

<main>
    <div class="m-5">
        <a href="/employee/create"
            class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
            Create Employee
        </a>
    </div>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 text-left text-sm font-semibold">ID</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">Employee Name</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">Salary</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">Age</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">Email</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">Department ID</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php while ($row = mssql_fetch_assoc($result)): ?>
                <tr class="hover:bg-gray-100 transition duration-150">
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['Id']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['EmployeeName']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['Salary']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['Age']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['Email']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['DepartmentId']) ?></td>
                    <td class="px-4 py-2 text-center">
                        <a href="/employee/edit??id=<?= $row['Id'] ?>"
                            class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded mr-2">Edit</a>
                        <a href="/employee/details?employeeId=<?= $row['Id'] ?>&nationalityId=<?= $row['NationalityId'] ?> "
                            class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded mr-2">View Details</a>    
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <div class="flex justify-center mt-6 space-x-2">
        <?php
        $range = 1; 
        $start = max(1, $page - $range);
        $end = min($total_pages, $page + $range);
    
        if ($page > 1) {
            echo "<a href='?page=" . ($page - 1) . "' class='px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300'>← Previous</a>";
        }
        for ($i = $start; $i <= $end; $i++) {
            $active = $i == $page ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300';
            echo "<a href='?page=$i' class='px-3 py-1 rounded $active'>$i</a>";
        }
        if ($page < $total_pages) {
            echo "<a href='?page=" . ($page + 1) . "' class='px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300'>→ Next</a>";
        }
        ?>
    </div>
</main>

<?php require('partials/footer.php') ?>