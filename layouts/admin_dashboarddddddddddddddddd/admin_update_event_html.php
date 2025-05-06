<section class="bg-gray-100 min-h-screen  flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="bg-white shadow-lg rounded-lg w-full max-w-md mx-4 p-6 sm:p-8">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 text-center mb-6">Editer un evenement</h1>
        <form method="POST" class="space-y-5">
            <!-- title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">title</label>
                <input id="title" name="title" type="text" required value="<?=htmlspecialchars($result['titre'] ?? '') ?>"
             
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <!-- description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">description</label>
                <textarea id="description" name="description" rows="5" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none"><?=htmlspecialchars($result['description'] ?? '') ?></textarea>
            </div>
            <!-- date_start -->
            <div>
                <label for="date_start" class="block text-sm font-medium text-gray-700 mb-1">date_start</label>
                <input id="date_start" name="date_start" type="date" required
             value="<?=$result['date_debut'] ?? '' ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>
           
            <!-- date_start -->
            <div>
                <label for="date_end" class="block text-sm font-medium text-gray-700 mb-1"> date_end</label>
                <input id="date_end" name="date_end" type="date" required     value="<?=$result['date_fin'] ?? '' ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>
             <!--  capacity -->
             <div>
                <label for="date_end" class="block text-sm font-medium text-gray-700 mb-1">Capacity</label>
                <input id="capacity" name="capacity" min="0" value="<?=$result['capacity']??'' ?>"  type="number" required
                
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>
            <!-- Bouton -->
            <div>
                <input type="submit" name="update_event_dashbord"
                    class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition" value="Enregistrer les modifications"/>
             
              
            </div>


        </form>
    </div>
</section>
