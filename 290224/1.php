<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<?php $tdClasses = 'border first:border-l-0 last:border-r-0 border-slate-300 dark:border-slate-700 px-4 py-3 text-slate-500 dark:text-slate-400' ?>

<body>
    <table class="border-collapse w-full border-y border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
        <thead class="bg-slate-50 dark:bg-slate-700">
          <tr>
            <th class="group border first:border-l-0 last:border-r-0 border-slate-300 dark:border-slate-600 font-semibold px-4 py-3 text-slate-900 dark:text-slate-200 text-left" aria-sort="ascending">
              <span class="flex gap-2 items-center w-full justify-between">
                Invoice #
                <svg viewBox="0 0 20 20" class="w-5 h-5 fill-slate-500 group-aria-[sort=ascending]:rotate-0 group-aria-[sort=descending]:rotate-180">
                  <path fill-rule="evenodd" d="M10 5a.75.75 0 01.75.75v6.638l1.96-2.158a.75.75 0 111.08 1.04l-3.25 3.5a.75.75 0 01-1.08 0l-3.25-3.5a.75.75 0 111.08-1.04l1.96 2.158V5.75A.75.75 0 0110 5z" clip-rule="evenodd"></path>
                </svg>
              </span>
            </th>
            <th class="border first:border-l-0 last:border-r-0 border-slate-300 dark:border-slate-600 font-semibold px-4 py-3 text-slate-900 dark:text-slate-200 text-left">Client</th>
            <th class="border first:border-l-0 last:border-r-0 border-slate-300 dark:border-slate-600 font-semibold px-4 py-3 text-slate-900 dark:text-slate-200 text-right">Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="<?= $tdClasses ?>">#100</td>
            <td class="<?= $tdClasses ?>">Pendant Publishing</td>
            <td class="<?= $tdClasses ?> text-right tabular-nums">$2,000.00</td>
          </tr>
          <tr>
            <td class="<?= $tdClasses ?>">#101</td>
            <td class="<?= $tdClasses ?>">Kruger Industrial Smoothing</td>
            <td class="<?= $tdClasses ?> text-right tabular-nums">$545.00</td>
          </tr>
          <tr>
            <td class="<?= $tdClasses ?>">#102</td>
            <td class="<?= $tdClasses ?>">J. Peterman</td>
            <td class="<?= $tdClasses ?> text-right tabular-nums">$10,000.25</td>
          </tr>
        </tbody>
      </table>
</body>

</html>