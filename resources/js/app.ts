import '../css/app.css';

import { createApp, h } from 'vue';
import { initializeTheme } from './composables/useAppearance';
import App from './pages/App.vue'
import { useTitle } from '@vueuse/core';

// Extend ImportMeta interface for Vite...
declare module 'vite/client' {
    interface ImportMetaEnv {
        readonly VITE_APP_NAME: string;
        [key: string]: string | boolean | undefined;
    }

    interface ImportMeta {
        readonly env: ImportMetaEnv;
        readonly glob: <T>(pattern: string) => Record<string, () => Promise<T>>;
    }
}


// This will set light / dark mode on page load...
initializeTheme();

const app = createApp(App, {
    useTitle: {
        title: () => {
            return import.meta.env.VITE_APP_NAME;
        },
    }
})
app.mount('#app');