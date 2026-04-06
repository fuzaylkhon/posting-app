<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{

    protected $model = Post::class;

    private static array $nature = [
        'titles' => [
            'The Ancient Language of Rivers',
            'When Forests Breathe at Dusk',
            'The Migration of Monarch Butterflies',
            'Stone, Lichen, and a Thousand Years',
            'What the Tide Leaves Behind',
            'The Oak`s First Hundred Winters',
            'Wolves and the Rewilding of Valleys',
            'Silence in the High Alpine Meadow',
            'The Hidden Life of Soil',
            'Bioluminescence: The Ocean`s Nightlamp',
            'Redwood  Groves and Deep Time',
            'The Physics of a Snowflake',
            'Coral Reefs and the Memory of Warmth',
            'Fog as a Living Entity',
            'The Patience of Glaciers',
            'Mycelium: The Forests Internet',
            'Tidal Zones and In-Between Lives',
            'The Geometry of a Birds Nest',
            'Desert Blooms After Rain',
            'Old-Growth and What We Inherit',
            'Listening to Bat Echolocation',
            'Spring Melt and the Return of Sound',
            'How Mountains Are Born and Unmade',
            'The Honesty of Bare Winter Trees',
            'Fireflies and Synchrony',
        ],
        'authors' => [
            'Elena Marsh',
            'Tobias Green',
            'Seren Willows',
            'Idris Fern',
            'Mira Stoneback',
            'Caleb Rivers',
            'Fiona Ash',
            'Luca Thorn',
        ],
        'bodies' => [
            "Standing at the edge of the forest just before nightfall, one becomes aware of a collective exhale — the trees releasing the day's accumulated warmth into the cooling air. Ecologists call this the nocturnal flux, a measurable transfer of carbon and moisture that has continued uninterrupted for millions of years. We are guests inside an ancient breath.",
            "The river has no memory and yet it remembers everything. Every stone it has shaped, every bank it has carved — the record exists in the landscape if not in the water itself. Hydrologists who study meander patterns find that rivers repeatedly rediscover their old courses after floods, as if drawn by geological muscle memory.",
            "Monarch butterflies navigate two thousand miles using a sun compass calibrated to the time of day. What makes this remarkable is that the compass must be reset continuously as the sun moves — achieved through a circadian clock in their antennae. They carry precision instrumentation in a body the weight of a paperclip.",
            "Soil is the slowest architecture. A single centimeter of healthy topsoil takes roughly a thousand years to form. Within it live more organisms per teaspoon than there are people on Earth — nematodes, fungi, bacteria, protozoa — each running their own metabolic cycle, exchanging nutrients in transactions older than language.",
            "When a forest burns, it is not simply destroyed. The fire reads the landscape, moving faster on south-facing slopes, lingering in debris-choked hollows. In its aftermath, certain seeds — sealed in resinous cones for decades — crack open in the heat, finally ready to germinate. Destruction carries its own key.",
            "Tide pools exist in a state of perpetual negotiation. Every six hours the sea reclaims and then abandons them, and the creatures within — anemones, ochre stars, hermit crabs — must be amphibious in their tolerance. They live on the boundary between worlds and have evolved to be comfortable with uncertainty.",
            "The mycelium network beneath a mature forest can extend for miles, connecting the root systems of trees across species. Sugar flows from sun-rich canopy trees to shaded seedlings below; in drought, moisture is redistributed. Scientists now debate whether this constitutes a form of distributed cognition — a forest thinking slowly through its roots.",
            "Glaciers move imperceptibly: a few inches per day, sometimes less. Yet in their movement they grind rock into flour, carve valleys into U-shapes, deposit boulders hundreds of miles from their origin. They operate on a timescale that makes human civilization look like a held breath.",
            "Bioluminescent organisms produce light through a chemical reaction requiring luciferin and luciferase — compounds that evolved independently at least forty times across the tree of life. The ocean's darkness is full of cold flames: dinoflagellates, anglerfish, deep-sea jellyfish. We sail across a ceiling of stars and below us is another sky.",
            "The snowflake begins as a water molecule attaching to a dust particle at altitude. As it falls, it passes through micro-climates of differing temperature and humidity, and at each stage its crystalline structure ramifies — branching according to thermodynamic law. Two snowflakes, falling through different air, will never follow the same path. Each is a record of a unique journey.",
        ],
    ];

    private static array $poetry = [
        'titles' => [
            'On the Difficulty of Translating Silence',
            'Fourteen Lines About a Closed Door',
            'The Stanza as a Room You Can Leave',
            'Enjambment and the Breath Between',
            'What the Villanelle Does to Grief',
            'Reading Keats in a Hospital Waiting Room',
            'The Image That Refuses to Mean',
            'Concrete Poetry and the Body of the Page',
            'Sappho, Fragments, and the Art of Incompletion',
            'Why Haiku Cannot Be Translated',
            'Meter as a Second Heartbeat',
            'The Elegys Long Argument with Loss',
            'When the Metaphor Outlives Its Meaning',
            'Spoken Word and the Return of the Oral',
            'Found Poetry: The World Already Writing',
            'Surrealism and the Logic of Dreams',
            'The Lyric "I" and Its Unreliability',
            'Against Explanation: Poetry That Refuses',
            'Repetition as Spell, Not Error',
            'The Prose Poems Uneasy Freedom',
            'What War Poetry Owes to Truth',
            'Sonnets After the Sonnet Was Over',
            'The Line Break as a Held Breath',
            'Reading Between the Strophes',
            'Ekphrasis: When Poems Look at Art',
        ],
        'bodies' => [
            "A poem begins where prose despairs. It is not that poetry refuses to explain — it is that explanation would replace the thing itself with a map of the thing, and maps, however accurate, are not the territory. When Celan writes 'No one kneads us again out of earth and clay,' the image does its work below the level of paraphrase. We feel before we understand, and that order matters.",
            "The villanelle's two refrains return, again and again, like a thought that will not resolve. Dylan Thomas used this form for a poem about his father's dying, and the repetition performs what grief performs: the same phrases accumulate different weight with each appearance. By the final quatrain, 'Do not go gentle into that good night' has become something larger than its first utterance.",
            "Enjambment — the running of a sentence past the line's end — creates a double meaning at the break. The reader pauses on one word, then discovers the next line revises what they understood. This is not merely technical: it models the way comprehension works, the way we revise our first impressions as more context arrives. A skilled line break is a tiny epistemological event.",
            "The haiku exists in the specific now. Bashō's frog and the sound of water exist in a single arrested moment, and the poem's task is to make the reader inhabit that moment rather than understand it. Translation can move the words but not the weight — the breath-length of seventeen syllables in Japanese is a different instrument than seventeen syllables in English.",
            "Sappho survives in pieces: scraps of papyrus, quotations preserved in other writers' arguments about grammar. Fragment 31, the jealousy poem, breaks off mid-sentence and this incompletion has generated two millennia of speculation. Perhaps incompletion is the poem's deepest statement. We are all, reading across time, working with what remains.",
            "Meter is not a cage but a resonance. When iambic pentameter is done well, it disappears — the reader does not count beats consciously but feels a current beneath the words, a pulse. Shakespeare's departures from the iambic base are meaningful precisely because the base exists: a variation is only legible against a pattern.",
            "The prose poem refuses the line break and thereby removes one of poetry's most powerful tools. What remains must do its work through image, rhythm, compression — through the quality of attention the prose pays to its subject. Claudel called it a verse of prose; others call it an essay that has lost its argument and found something better.",
            "Found poetry is the art of noticing. The poet looks at a train timetable, a legal disclaimer, a grocery receipt, and makes a cut — frames a selection of language that already existed and presents it as worthy of contemplative attention. The radical claim is that poetry is not made but discovered: the world is already writing; we only decide where to look.",
            "The elegy does not simply mourn; it argues. It argues with death's authority, with its own inadequacy to the task of memorializing, with the very language it must use. 'In Memoriam' is Tennyson processing grief across seventeen years and 133 cantos, and the length is the point — grief does not resolve, it accumulates into something you learn to carry.",
            "Spoken word poets rediscovered what ancient audiences knew: poetry is an acoustic event, a performance of language in real time. The breath of the performer, the pause before a key word, the sudden drop in volume — these become part of the text. A spoken word poem on the page is only a score; the performance is the piece.",
        ],
    ];

    private static array $science = [
        'titles' => [
            'The Standard Model: An Incomplete Map',
            'CRISPR and the Ethics of the Editable Genome',
            'What Consciousness Might Be Made Of',
            'Dark Matter: The Shape of What We Cannot See',
            'The Double Helix at Seventy',
            'Quantum Entanglement Without the Mysticism',
            'How Plate Tectonics Remade the World',
            'The Fermi Paradox in 2024',
            'Neural Plasticity and the Changing Brain',
            'The Mathematics Beneath Music',
            'Antibiotics and the Clock Thats Running Out',
            'How Black Holes Evaporate: Hawkings Last Bet',
            'The Gut Microbiome and the Mind Connection',
            'General Relativity in Everyday Life (GPS)',
            'Epigenetics: Beyond the Code',
            'The Return of mRNA Vaccines',
            'Exoplanet Atmospheres and the Search for Biosignatures',
            'Computing at the Edge of Thermodynamics',
            'How Sleep Clears the Brain',
            'The Many Worlds of Quantum Mechanics',
            'Synthetic Biology and the New Industrial Revolution',
            'Why Time Has a Direction',
            'The Human Connectome Project',
            'Photosynthesis: The Most Important Chemistry on Earth',
            'Fusion Energy: The Thirty-Year Horizon Finally Arriving',
        ],
        'bodies' => [
            "The Standard Model of particle physics describes seventeen fundamental particles and three of the four known forces with extraordinary precision — yet physicists uniformly describe it as incomplete. It does not incorporate gravity. It does not explain why matter outweighs antimatter in the universe. It does not account for dark matter or dark energy, which together constitute roughly 95% of the universe's content. It is the most successful theory in the history of science and almost certainly wrong in ways we haven't identified yet.",
            "CRISPR-Cas9 is not a single tool but a class of molecular scissors derived from a bacterial immune system. Bacteria use it to cut and store snippets of viral DNA as a form of immunological memory. Scientists repurposed this mechanism to make precise edits to any genome — plant, animal, human. The ethical questions it raises are proportional to its power: who decides which genes are errors, and who has access to the correction?",
            "Quantum entanglement is real, experimentally confirmed, and not magic. When two particles interact and become entangled, measuring the state of one instantly determines the state of the other, regardless of distance. This is not faster-than-light communication — no information can be transmitted this way. The strangeness is that the particles did not have defined states before measurement; measurement is what creates the definiteness.",
            "GPS satellites must correct for relativistic effects to remain accurate. Time passes slightly faster at orbital altitude (special relativity) and slightly slower due to the satellite's velocity (general relativity). Without these corrections — which Einstein's equations provide — GPS coordinates would drift by roughly ten kilometers per day. Every time a phone navigates, it runs an implicit test of general relativity, and general relativity wins.",
            "Sleep is not rest; it is maintenance. During deep sleep, the brain's glymphatic system — a network of fluid channels that surrounds blood vessels — becomes highly active, flushing out metabolic waste products including amyloid-beta proteins associated with Alzheimer's disease. The brain uses sleep to clean itself. Chronic sleep deprivation is not merely fatigue — it is deferred housekeeping with compounding consequences.",
            "The human gut contains approximately 38 trillion bacteria — roughly equivalent to the number of human cells in the body. This microbiome is not a passive passenger: it synthesizes vitamins, trains the immune system, and communicates with the brain via the vagus nerve and the production of neurotransmitter precursors. Gut dysbiosis has been linked to depression, anxiety, and autoimmune conditions. We are, in a real sense, ecosystems.",
            "mRNA vaccines do not alter DNA. They deliver temporary instructions to ribosomes — the cell's protein-making machinery — to produce a specific antigen, triggering an immune response. The mRNA degrades within days; no trace remains. The technology was in development for thirty years, refined for cancer treatments, and then deployed globally in ten months when the sequence of a novel coronavirus became available. Speed was the product of preparation.",
            "Hawking radiation arises from a quantum effect at the event horizon of a black hole. Virtual particle pairs that form at the boundary can be split — one falling in, one escaping — and over immense timescales, this causes the black hole to slowly lose mass and eventually evaporate. The information paradox this creates — what happens to the information describing everything the black hole consumed — remains one of the deepest unsolved problems in physics.",
            "Neural plasticity — the brain's ability to reorganize itself by forming new neural connections — continues throughout life, though it is most pronounced in childhood. London taxi drivers, who must memorize an enormous map of streets, show measurable enlargement of the hippocampus over years of work. Musicians who begin training before age seven develop thicker corticospinal tracts. The brain is not fixed hardware but a responsive architecture.",
            "Photosynthesis converts roughly 100 terawatts of sunlight annually into chemical energy — more than six times humanity's total energy consumption. The light-dependent reactions in the thylakoid membrane split water molecules and release oxygen; the Calvin cycle uses that energy to fix carbon dioxide into sugar. Every breath of oxygen, every calorie of food, is downstream of this reaction. It is the most consequential chemistry on the planet.",
        ],
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $theme = $this->faker->randomElement(Post::THEMES);
        $pool  = match ($theme) {
            Post::THEME_NATURE  => self::$nature,
            Post::THEME_POETRY  => self::$poetry,
            Post::THEME_SCIENCE => self::$science,
        };

        $title = $this->faker->randomElement($pool['titles']);
        $body  = $this->faker->randomElement($pool['bodies']);

        return [
            'title'        => $title,
            'body'         => $body,
            'theme'        => $theme,
            'user_id'      => \App\Models\User::factory(),
            'is_published' => $this->faker->boolean(100),
            'created_at'   => $this->faker->dateTimeBetween('-2 years', 'now'),
            'updated_at'   => now(),
        ];
    }

    public function nature(): static
    {
        return $this->state(['theme' => Post::THEME_NATURE]);
    }

    public function poetry(): static
    {
        return $this->state(['theme' => Post::THEME_POETRY]);
    }

    public function science(): static
    {
        return $this->state(['theme' => Post::THEME_SCIENCE]);
    }

    public function published(): static
    {
        return $this->state(['is_published' => true]);
    }

    public function draft(): static
    {
        return $this->state(['is_published' => false]);
    }
}
