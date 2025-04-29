<template>
    <div>
        <h2>Dashboard Prices</h2>
        <ul>
            <li v-for="(row, index) in prices" :key="index">
                {{ row[0] }}: {{ row[1] }}
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Dashboard',

    data() {
        return {
            prices: [],
        };
    },

    mounted() {
        axios.get('/dashboard')
            .then(response => {
                this.prices = response.data;
            })
            .catch(error => {
                console.error('Error fetching prices:', error);
            });
    },
};
</script>
