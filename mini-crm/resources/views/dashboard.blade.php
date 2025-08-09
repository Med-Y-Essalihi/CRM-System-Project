<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-header">
            <h2>Dashboard</h2>
        </div>
    </x-slot>

    <style>
            /* Container padding */
            .dashboard-container {
                padding: 2rem 1rem; /* same as py-6 px-4 */
                max-width: 1200px;
                margin: 0 auto;
            }
        
            /* Grid layout */
            .dashboard-grid {
                display: grid;
                grid-template-columns: repeat(1, 1fr);
                gap: 1rem;
                color: white;
            }
            @media (min-width: 768px) {
                .dashboard-grid {
                    grid-template-columns: repeat(3, 1fr);
                }
            }
        
            /* Card style */
            .dashboard-card {
                padding: 1.5rem;
                border-radius: 1rem;
                box-shadow: 0 8px 20px rgba(0,0,0,0.15);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                cursor: default;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
        
            .dashboard-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 25px rgba(0,0,0,0.3);
            }
        
            /* Colors */
            .dashboard-card.blue {
                background-color: rgb(5, 0, 19); /* Tailwind blue-500 */
                color: rgb(45, 133, 204) ;
                box-shadow: 5px 5px 5px rgb(0, 0, 0);
            }

            .dashboard-card.blue:hover{
                box-shadow: 5px 5px 5px rgb(45, 133, 204);
            }

            .dashboard-card.green {
                background-color: rgb(5, 0, 19); /* Tailwind green-500 */
                color: #32b34e;
                box-shadow: 5px 5px 5px #000000;
            }

            .dashboard-card.green:hover{
                box-shadow: 5px 5px 5px #32b34e;
            }

            .dashboard-card.red {
                background-color: rgb(5, 0, 19); /* Tailwind red-500 */
                color: #F44336;
                box-shadow: 5px 5px 5px #000000;
            }

            .dashboard-card.red:hover{
                box-shadow: 5px 5px 5px #F44336;
            }
        
            /* Headings */
            .dashboard-card h3 {
                font-size: 1.25rem;
                margin-bottom: 0.75rem;
                font-weight: 600;
            }
        
            /* Numbers */
            .dashboard-card p {
                font-size: 2.5rem;
                font-weight: 700;
                letter-spacing: 0.05em;
                line-height: 1;
            }
        
            /* Header styling */
            .dashboard-header h2 {
                font-weight: 700;
                font-size: 2rem;
                color: #00ADB5; /* Your turquoise color */
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin-bottom: 1rem;
                text-align: center;
            }
    </style>
        


    <div class="dashboard-container">
        <div class="dashboard-grid">
            <div class="dashboard-card blue">
                <h3>Total Clients</h3>
                <p>{{ count($clients) }}</p>
            </div>

            <div class="dashboard-card green">
                <h3>Tasks Due Today</h3>
                <p>{{ count($tasksToday) }}</p>
            </div>
            
            <div class="dashboard-card red">
                <h3>Overdue Tasks</h3>
                <p>{{ count($overdueTasks) }}</p>
            </div>
        </div>
    </div>
</x-app-layout>


                