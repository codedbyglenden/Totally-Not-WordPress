'use strict';

import path from 'path';
import { defineConfig } from 'vite';

export default defineConfig({
	envDir: './env',
	build: {
		target: 'esnext',
		rollupOptions: {
			input: {
				'app': path.resolve(__dirname, '../assets/src/ts/app.ts'),
			},
			output: [
				{
					dir: path.resolve(__dirname, '../assets/dist/js'),
					format: 'cjs',
					entryFileNames: '[name].min.js',
				}
			],
		},
		sourcemap: false,
	}
});
