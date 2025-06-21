import { definePreset } from "@primeuix/themes";
import Aura from "@primeuix/themes/aura";

const Noir = definePreset(Aura, {
    semantic: {
        primary: {
            50:  "#ecfdf5",
            100: "#d1fae5",
            200: "#a7f3d0",
            300: "#6ee7b7",
            400: "#34d399",
            500: "#10b981",
            600: "#059669",
            700: "#047857",
            800: "#065f46",
            900: "#064e3b",
            950: "#022c22",
        },
        colorScheme: {
            dark: {
                primary: {
                    color: "#10b981",           // emerald-500
                    inverseColor: "#18181b",    // zinc-950
                    hoverColor: "#34d399",      // emerald-400
                    activeColor: "#059669",     // emerald-600
                },
                highlight: {
                    background: "#065f46",      // emerald-800
                    focusBackground: "#047857", // emerald-700
                    color: "#ffffff",
                    focusColor: "#d1fae5",      // emerald-100
                },
            },
            light: {
                primary: {
                    color: "#10b981",
                    inverseColor: "#ffffff",
                    hoverColor: "#34d399",
                    activeColor: "#059669",
                },
                highlight: {
                    background: "#d1fae5",
                    focusBackground: "#a7f3d0",
                    color: "#065f46",
                    focusColor: "#065f46",
                },
            },
        },
    },
    defaultColorScheme: "dark"
});

export default Noir;