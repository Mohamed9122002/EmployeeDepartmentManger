<?php require __DIR__ . '/../partials/head.php'; ?>
<?php require __DIR__ . '/../partials/nav.php'; ?>
<main>
    <div class="m-5">
        <a href="/employee/wives"
            class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
            CreateEmployeeWife
        </a>
        <a href="/employee/children"
            class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
            CreateEmployeeChildren
        </a>
    </div>
    <div class="m-5">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Details Employee</h2>
    </div>
    <table class="min-w-full M-5 divide-y divide-gray-200 border border-gray-300 shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 text-left text-sm font-semibold">EmployeeId</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">EmployeeName</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">WifeNationalId</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">WifeName </th>
                <th class="px-4 py-2 text-left text-sm font-semibold">ChildName</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">ChildNationalId</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">Nationality</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php while ($row = mssql_fetch_assoc($EmployeeDetails)): ?>
                <tr class="hover:bg-gray-100 transition duration-150">
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['EmployeeId']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['EmployeeName']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['WifeName']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['WifeNationalId']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['ChildName']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['ChildNationalId']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($nationality) ?></td>
                    <td class="px-4 py-2 text-center">
                        <a href="/employee/deleteChild?id=<?= $row['ChildId'] ?>"
                            class="bg-red-700 hover:bg-red-600 text-white py-1 px-3 rounded mr-2">Delete Child</a>
                        <a href="/employee/deleteWife?id=<?= $row['WifeId'] ?>"
                            class="bg-red-700 hover:bg-red-600 text-white py-1 px-3 rounded mr-2">Delete Wife</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>